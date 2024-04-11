<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentCategory;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        foreach($documents as $document)
        {
            $category = DocumentCategory::find($document->category_id);
            if($category)
            {
                $document['category'] = $category->category_name;
                unset($document['category_id']);
            }
            $document['expiry_date'] = Carbon::parse($document['expiry_date'])->format('d-m-Y');
        }
        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DocumentCategory::all();
        return view('documents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'document' => 'required|file',
            'expiry_date' => 'required',
            'category_id' => 'required'
        ],[ 'required' => 'This field is required']);

        if($request->has('document'))
        {
            $category = DocumentCategory::find($request->category_id);
            if($category)
            {
                $allowedExtensions = explode(", ", $category->accepted_types);
                $extension = $request->file('document')->getClientOriginalExtension();
                if(!in_array(strtolower($extension), $allowedExtensions))
                {
                    Toastr::error("Invalid extension for " . $category->category_name, "Error");
                    return redirect()->back();
                }
                $data = $request->all();

                $document = $request->file('document');
                $imageName = time() . "." . $extension;
                $imageSize = $document->getSize();
                $document->move(storage_path('app/public/documents/'),$imageName);
                $data['document_name'] = $imageName;
                $data['document_type'] = $extension;
                $data['document_size'] = $imageSize;
                unset($data['document']);

                $status = Document::create($data);
                if($status)
                {
                    Toastr::success('Document uploaded successfully', 'success');
                    return redirect()->route('documents.index');
                }
                else
                {
                    Toastr::error('Some error occurred', 'error');
                    return redirect()->back();
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }

    public function deleteDocument($id)
    {
        $document = Document::find($id);
        if($document)
        {
            $document->delete();
            //Delete the resource from storage
            $path = storage_path('app/public/documents/'. $document->document_name);
            unlink($path);
            Toastr::success('Document deleted successfully', 'Success');
            return redirect()->route('documents.index');
        }
        else
        {
            Toastr::error('Some error occurred', 'Error');
            return redirect()->back();
        }
    }
}
