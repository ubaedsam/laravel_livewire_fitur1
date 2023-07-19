<div>
    Name : <br>
    <input type="text" wire:model="name">
    <br>

    Pesan : <br>
    <textarea wire:model="pesan"></textarea><br>

    Ubaed S.A.M : <br>
    Single <input type="radio" value="single" wire:model="status">
    Married <input type="radio" value="married" wire:model="status">

    Favorite Colour : <br>
    
    Red <input type="checkbox" value="Red" wire:model="color"><br>
    Green <input type="checkbox" value="Green" wire:model="color"><br>
    Blue <input type="checkbox" value="Blue" wire:model="color"><br>

    Favorite Fruit : <br>
    
    <select wire:model="fruit">
        <option value="">Pilih Buah</option>
        <option value="mangga">Mangga</option>
        <option value="apel">Apel</option>
    </select>

    <hr>
    Name : {{ $name }}
    Pesan : {{ $pesan }}
    Status : {{ $status }}
    Favorite Colour : 
    <ul>
        @foreach ($color as $warna)
            <li>{{ $warna }}</li>
        @endforeach
    </ul>
    Buah : {{$fruit}}
</div>
