<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all();

        return ResponseFormatter::success($complaints, 'Get All Complaints', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'category' => 'required',
            'title' => 'required|string',
            'report' => 'required|string',
            'nik' => 'required',
            'birth_date' => 'required|date',
            'attachments' => 'nullable|array|max:4',
            'attachments.*' => 'file|image|max:5000',
            'device_uid' => 'required|string'
        ]);

        if ($validated->fails()) {
            return ResponseFormatter::error(null, $validated->getMessageBag()->first(), 400);
        }

        $create = Complaint::create([
            'category' => $request->category,
            'title' => $request->title,
            'report' => $request->report,
            'nik' => $request->nik,
            'birth_date' => $request->birth_date,
            'device_uid' => $request->device_uid
        ]);

        if ($create) {
            if ($request->hasFile('attachments')) {
                foreach ($request->attachments as $key => $file) {
                    $path = $file->store('attachments');

                    $create->attachments[$key] = Attachment::create([
                        'complaint_id' => $create->id,
                        'path' => $path
                    ]);
                }
            }
            return ResponseFormatter::success($create, 'Complaint Sended Successfully', 201);
        }
        return ResponseFormatter::error(null, 'Something Wrong', 400);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::with(['attachments'])->find($id);

        if ($complaint == null) {
            return ResponseFormatter::error(null, 'Complaint Not Found', 404);
        }

        return ResponseFormatter::success($complaint, 'Get Detail Complaint', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $complaint = Complaint::find($id);

        if ($complaint == null) {
            return ResponseFormatter::error(null, 'Complaint Not Found', 404);
        }

        $validated = Validator::make($request->all(), [
            'category' => 'required',
            'title' => 'required|string',
            'report' => 'required|string',
            'nik' => 'required',
            'birth_date' => 'required|date',
            'attachments' => 'nullable|array|max:4',
            'attachments.*' => 'file|image|max:5000',
            'device_uid' => 'required|string'
        ]);

        if ($validated->fails()) {
            return ResponseFormatter::error(null, $validated->getMessageBag()->first(), 400);
        }

        $update = $complaint->update($request->only(['category', 'title', 'report', 'nik', 'birth_date', 'uuid']));

        if ($update) {
            if ($request->hasFile('attachments')) {
                foreach ($request->attachments as $file) {
                    $path = $file->store('attachments');

                    $complaint->attachments[] = Attachment::create([
                        'complaint_id' => $complaint->id,
                        'path' => $path
                    ]);
                }
            }
            return ResponseFormatter::success($complaint, 'Complaint Updated Successfully', 200);
        }
        return ResponseFormatter::error(null, 'Something Wrong', 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaint::with('attachments')->find($id);

        if ($complaint == null) {
            return ResponseFormatter::error(null, 'Complaint Not Found', 404);
        }

        foreach ($complaint->attachments as $file) {
            $path = explode('storage/', $file->path)[1];
            Storage::delete($path);
        }
        $complaint->delete();

        return ResponseFormatter::success(null, "Complaint Deleted Successfully", 200);
    }

    public function getByUid($uid)
    {
        $complaints = Complaint::where('device_uid', $uid)->get();

        return ResponseFormatter::success($complaints, 'Get All Complaints', 200);
    }

    public function deleteAttachment($id)
    {
        $attachment = Attachment::find($id);

        if ($attachment == null) {
            return ResponseFormatter::error(null, 'Complaint Attachment Not Found', 404);
        }

        $path = explode('storage/', $attachment->path)[1];
        Storage::delete($path);
        $attachment->delete();

        return ResponseFormatter::success(null, "Complaint Attachment Deleted Successfully", 200);
    }
}
