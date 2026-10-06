<?php

use Livewire\Component;

new class extends Component
{
    public int $count = 0;

    public int $amount = 1;

    public $errorMsg = "";

    public function increment()
    {
        $this->count += $this->amount;
        $this->errorMsg = "";
    }

    public function decrese()
    {
        $result = $this->count - $this->amount;
        if ($result >= 0) {
            $this->count -= $this->amount;
        } else {
            $this->errorMsg = "Invalid operation";
        }
    }
};
?>

<div>
    <p>Number: {{ $count }}</p>

    <button wire:click="increment">Povećaj</button>
    <button wire:click="decrese">Smanji</button>

    <p class="mt-2 bg-red-400 text-white text-sm">{{ $errorMsg }}</p>

    <input type="text" min="1" wire:model.live.debounce="amount" />
    <p>Amount is: {{ $amount }}</p>
</div>