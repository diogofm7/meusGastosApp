<div class="max-w-7xl mx-auto py-15 px-4">

    <x-slot name="header">
        Criar Registro
    </x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="createExpense" class="w-full max-w-7xl mx-auto">
        <div class="flex flex-wrap mx-3 mb-6">

            <p class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="description">Descrição Registro</label>
                <input type="text" id="description" name="description" wire:model="description"
                       class="block appearance-none w-full bg-gray-200 border @error('description') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('description')
            <h5 class="pl-3 text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>


            <p class="w-full px-3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="amount">Valor do Registro</label>
                <input type="text" id="amount" name="amount" wire:model="amount"
                       class="block appearance-none w-full bg-gray-200 border @error('amount') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('amount')
            <h5 class="pl-3 text-red-500 text-xs italic">{{$message}}</h5>
            @enderror

            </p>


            <p class="w-full px-3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="type">Tipo do Registro</label>
                <select name="type" id="type" wire:model="type" class="block appearance-none w-full bg-gray-200 border @error('type') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Selecione o tipo do registro: Entrada ou Saída...</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>

            @error('type')
            <h5 class="pl-3 text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>

            <p class="w-full px-3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="photo">Comprovante</label>
                <input type="file" id="photo" name="photo" wire:model="photo"
                       class="block appearance-none w-full bg-gray-200 border @error('photo') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" alt="" width="150px" class="mt-3">
            @endif

            @error('photo')
            <h5 class="pl-3 text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>

            <p class="w-full px-3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="expenseDate">Data do Comprovante</label>
                <input type="datetime-local" id="expenseDate" name="expenseDate" wire:model="expenseDate"
                       class="block appearance-none w-full bg-gray-200 border @error('expenseDate') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('expenseDate')
            <h5 class="pl-3 text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>

        </div>
        <div class="w-full py-4 px-3 mb-6">

            <button type="submit"
                    class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">Criar Registro</button>
        </div>

    </form>
</div>
