<div class="py-4">
    <x-slot name="header">
        Atualizar Registro
    </x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="updateExpense">
        <p>
            <label for="description">Descrição Registro</label>
            <input type="text" id="description" name="description" placeholder="Descrição" class="shadow border-t rounded" wire:model="description">

        @error('description')
        <h5 class="text-red-600">{{ $message }}</h5>
        @enderror
        </p>

        <p class="pt-4">
            <label for="amount">Valor do Registro</label>
            <input type="text" id="amount" name="amount" placeholder="Valor" class="shadow border-t rounded" wire:model="amount">

        @error('amount')
        <h5 class="text-red-600">{{ $message }}</h5>
        @enderror
        </p>

        <p class="pt-4">
            <label for="type">Tipo do Registro</label>
            <select name="type" id="type" class="shadow border-t rounded" wire:model="type">
                <option value="">Tipo</option>
                <option value="1">Entrada</option>
                <option value="2">Saída</option>
            </select>

        @error('type')
        <h5 class="text-red-600">{{ $message }}</h5>
        @enderror
        </p>

        <button type="submit" class="pt-4">Atualizar Registro</button>
    </form>
</div>
