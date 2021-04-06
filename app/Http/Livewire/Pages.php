<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

class Pages extends Component
{
    public $pages,$title,$body,$page_id,$published;
    public $isOpen = 0;

    public function render()
    {
        $user = auth()->user();
        $this->pages = $user->pages;
        return view('livewire.pages');
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
    private function resetInputFields()
    {
        $this->title = '';
        $this->body = '';
        $this->published = '';
        $this->page_id = '';
    }
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'published' => 'required',
        ]);

        Page::updateOrCreate(['id' => $this->page_id], [
            'title' =>$this->title,
            'body'=>$this->body,
            'published' => $this->published,
        ]);
        session()->flash('message',
            $this->page_id ? 'Page Updated Successfully.' : 'Page Created Successfully');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $this->page_id = $id;
        $this->title = $page->title;
        $this->body = $page->body;
        $this->published = $page->published;
        $this->openModal();

    }
    public function delete($id)
    {
        Page::find($id)->delete();
        session()->flash('message','Page Deleted Successfully');
    }

}
