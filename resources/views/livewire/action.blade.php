<div>
    {{-- Penjumlahan --}}
    <button type="button" wire:click.prevent="addTwoNumbers(32,55)">sum</button>

    <textarea wire:keydown.enter="TampilkanPesan($event.target.value)"></textarea>

    <form wire:submit.prevent="getJumlah">
        Num1 :<input type="text" name="num1" wire:model="num1">
        Num2 :<input type="text" name="num2" wire:model="num2">
        <button type="submit">Submit</button>
    </form>

    <hr>
    Sum : {{ $sum }}
    Pesan : {{ $pesan }}
</div>
