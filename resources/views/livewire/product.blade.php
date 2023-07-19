<div>
    Judul : <input type="text" wire:model="title"><br>

    Nama : <input type="text" wire:model="name"><br>

    {{-- Hasil --}}
    <hr>
    <h3>Title : {{ $title }}</h3>
    <h3>Nama : {{ $name }}</h3>
    <h3>Lifecycle Hooks Method</h3>

    @foreach ($infos as $info)
    <h4>{{ $info }}</h4>
    @endforeach
</div>
