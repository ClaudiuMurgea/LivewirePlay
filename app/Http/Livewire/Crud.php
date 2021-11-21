<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class Crud extends Component
{   

    public $selectData = true;
    public $createData = false;
    public $updateData = false;

    public $name;
    public $email; 
    public $country;

    public $ids;
    public $edit_name;
    public $edit_email; 
    public $edit_country;



    public function render()
    {   
        $student = Student::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.crud', ['students' => $student])->layout('layouts.app');
    }

    public function resetField()
    {
        $this->name = "";
        $this->email = "";
        $this->country = "";
        $this->$ids="";
        $this->$edit_name="";
        $this->$edit_email=""; 
        $this->$edit_country="";
    }
    

    public function showForm ()
    {
        $this->createData = true;
        $this->selectData = false;
    }

    public function create ()
    {   
        $validatedData = $this->validate([
            'name'      => 'required',
            'email'     => 'required',
            'country'   => 'required' 
        ]);

        $student = new Student();
        Student::create($validatedData);
        return redirect()->to('/');

        // public $name;
        // public $email;
        // public $country;
       
        // public function submit()
        // {
        //     $validatedData = $this->validate([
        //         'name' => 'required|min:6',
        //         'email' => 'required|email',
        //         'country' => 'required',
        //     ]);
       
        //     Student::create($validatedData);
       
        //     return redirect()->to('/form');
        // }
       
        // public function render()
        // {
        //     return view('livewire.crud');
        // }
    }

    public function edit ($id)
    {   
        $this->createData = false;
        $this->updateData = true;

        $student=Student::findOrFail($id);
        $this->ids = $student->id;
        $this->edit_name = $student->name;
        $this->edit_email = $student->email;
        $this->edit_country = $student->country;

    }

    public function update ($id)
    {
        $student = Student::findOrFail($id);
        $this->validate([    
            'edit_name' => 'required',
            'edit_email' => 'required',
            'edit_country' => 'required',
        ]);

        

        $student->name = $this->edit_name;
        $student->email = $this->edit_email;
        $student->country = $this->edit_country;
        $student->save();

        $this->selectData = true;
        $this->updateData = false;

    }
}
