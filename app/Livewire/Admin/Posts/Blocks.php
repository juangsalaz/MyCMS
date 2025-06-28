<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;

class Blocks extends Component
{
    public $blocks = [];

    public function addBlock($type)
    {
        $this->blocks[] = ['type' => $type, 'data' => []];
    }

    public function removeBlock($index)
    {
        unset($this->blocks[$index]);
        $this->blocks = array_values($this->blocks);
    }

    public function updated()
    {
        // setiap kali ada property berubah (termasuk input user), langsung emit ke parent
        $this->dispatch('blocksUpdated', $this->blocks);
    }

    public function render()
    {
        return view('livewire.admin.posts.blocks');
    }
}
