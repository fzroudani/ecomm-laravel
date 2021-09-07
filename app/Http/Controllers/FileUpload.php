<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Product;

class FileUpload extends Controller
{
    public function createForm(){
        return view('file-upload');
    }

    public function fileUpload(Request $req){

        if($req->file() || $req->type=='tableauTriptyque') {

            if($req->type=='tableauCarre')
            {
                $req->validate([
                    'myfile'=>'required|mimes:jpg'
                ]);
                $fileModel = new Product;

                $fileModel->type=$req->type;
                $fileModel->cadre="avec cadre";
                $fileModel->measure="100x60";
                $fileName = time().'_'.$req->file('myfile')->getClientOriginalName();
                $filePath = $req->file('myfile')->storeAs("uploads/$req->type", $fileName, 'public');
                $fileModel->gallery = time().'_'.$req->myfile->getClientOriginalName();
                $fileModel->file_path = 'storage/' . $filePath;
                $fileModel->save();

                $fileModel1 = new Product;

                $fileModel1->type=$req->type;
                $fileModel1->cadre="avec cadre";
                $fileModel1->measure="130x80";
                $fileName = $fileModel->gallery;
                $filePath = $req->file('myfile')->storeAs("uploads/$req->type", $fileName, 'public');
                $fileModel1->gallery =$fileModel->gallery;
                $fileModel1->file_path = 'storage/' . $filePath;
                $fileModel1->save();

                $fileModel2 = new Product;

                $fileModel2->type=$req->type;
                $fileModel2->cadre="sans cadre";
                $fileModel2->measure="104x64";
                $fileName = time().'_'.$req->file('myfile')->getClientOriginalName();
                $filePath = $req->file('myfile')->storeAs("uploads/$req->type", $fileName, 'public');
                $fileModel2->gallery =$fileModel->gallery;
                $fileModel2->file_path = 'storage/' . $filePath;
                $fileModel2->save();

                $fileModel3 = new Product;

                $fileModel3->type=$req->type;
                $fileModel3->cadre="sans cadre";
                $fileModel3->measure="134x84";
                $fileName = time().'_'.$req->file('myfile')->getClientOriginalName();
                $filePath = $req->file('myfile')->storeAs("uploads/$req->type", $fileName, 'public');
                $fileModel3->gallery = $fileModel->gallery;
                $fileModel3->file_path = 'storage/' . $filePath;
                $fileModel3->save();
            }elseif ($req->type=='grandFormat'){
                $req->validate([
                    'myfile'=>'required|mimes:jpg'
                ]);
                $fileModel = new Product;


                $fileModel->type=$req->type;
                $fileModel->cadre="avec cadre";
                $fileModel->measure="180x50";
                $fileName = time().'_'.$req->file('myfile')->getClientOriginalName();

                $filePath = $req->file('myfile')->storeAs("uploads/$req->type", $fileName, 'public');
                $fileModel->gallery = time().'_'.$req->myfile->getClientOriginalName();
                $fileModel->file_path = 'storage/' . $filePath;
                $fileModel->save();

                $fileModel1 = new Product;

                $fileModel1->type=$req->type;
                $fileModel1->cadre="avec cadre";
                $fileModel1->measure="220x60";
                $fileName = $fileModel->gallery;
                $filePath = $req->file('myfile')->storeAs("uploads/$req->type", $fileName, 'public');
                $fileModel1->gallery = $fileModel->gallery;
                $fileModel1->file_path = 'storage/' . $filePath;
                $fileModel1->save();

                $fileModel2 = new Product;

                $fileModel2->type=$req->type;
                $fileModel2->cadre="sans cadre";
                $fileModel2->measure="184x54";
                $fileName = $fileModel->gallery;
                $filePath = $req->file('myfile')->storeAs("uploads/$req->type", $fileName, 'public');
                $fileModel2->gallery = $fileModel->gallery;
                $fileModel2->file_path = 'storage/' . $filePath;
                $fileModel2->save();

                $fileModel3 = new Product;

                $fileModel3->type=$req->type;
                $fileModel3->cadre="sans cadre";
                $fileModel3->measure="224x64";
                $fileName = $fileModel->gallery;
                $filePath = $req->file('myfile')->storeAs("uploads/$req->type", $fileName, 'public');
                $fileModel3->gallery = $fileModel->gallery;
                $fileModel3->file_path = 'storage/' . $filePath;
                $fileModel3->save();
            }elseif($req->type=='tableauTriptyque'){

                $req->validate([
                    'files.*'=>'required|mimes:jpg,png'
                ]);
                $name=time().'_';
                $fileModel = new Product;
                $fileModel->type=$req->type;
                $fileModel->cadre="avec cadre";
                $fileModel->measure="40x60";
                foreach ($req->file('files') as $file){

                    $fileName = time().'_'.$file->getClientOriginalName();
                    $file->storeAs("uploads/$req->type/$name", $fileName, 'public');


                }
                $fileModel->gallery = $name;
                $fileModel->file_path = '/storage/uploads/'.$req->type.'/'. $name;
                $fileModel->save();


                $fileModel1 = new Product;
                $fileModel1->type=$req->type;
                $fileModel1->cadre="avec cadre";
                $fileModel1->measure="60x100";
                $fileModel1->gallery = $name;
                $fileModel1->file_path = '/storage/uploads/'.$req->type.'/'. $name;
                $fileModel1->save();


                $fileModel2 = new Product;
                $fileModel2->type=$req->type;
                $fileModel2->cadre="sans cadre";
                $fileModel2->measure="64x104";

                $fileModel2->gallery = $name;
                $fileModel2->file_path = '/storage/uploads/'.$req->type.'/'. $name;
                $fileModel2->save();


                $fileModel3 = new Product;
                $fileModel3->type=$req->type;
                $fileModel3->cadre="sans cadre";
                $fileModel3->measure="44x64";

                $fileModel3->gallery = $name;
                $fileModel3->file_path = '/storage/uploads/'.$req->type.'/'. $name;
                $fileModel3->save();


            }

        return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }

    }

}
