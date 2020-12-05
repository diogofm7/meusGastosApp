<div class="max-w-7xl mx-auto py-15 px-4">
    <x-slot name="header">
        Atualizar Registro
    </x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="updateExpense" class="w-full max-w-7xl mx-auto">

        <div class="flex flex-wrap -mx-3 mb-6">

            <p class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1">Descrição Registro</label>
                <input type="text" name="description" wire:model="description"
                       class="block appearance-none w-full bg-gray-200 border @error('description') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('description')
            <h5 class="pl-3 text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>


            <p class="w-full px-3 mb-6 md:mb-0 md:mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1">Valor do Registro</label>
                <input type="text" name="amount" wire:model="amount"
                       class="block appearance-none w-full bg-gray-200 border @error('amount') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('amount')
            <h5 class="pl-3 text-red-500 text-xs italic">{{$message}}</h5>
            @enderror

            </p>


            <p class="w-full px-3 mb-6 md:mb-0 md:mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1">Tipo do Registro</label>
                <select name="type" id="" wire:model="type" class="block appearance-none w-full bg-gray-200 border @error('type') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Selecione o tipo do registro: Entrada ou Saída...</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>

            @error('type')
            <h5 class="pl-3 text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>

            <p class="w-full px-3 mb-6 md:mb-0 md:mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="photo">Comprovante</label>
                <input type="file" id="photo" name="photo" wire:model="photo"
                       class="block appearance-none w-full bg-gray-200 border @error('photo') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" alt="" width="150px" class="mt-3">
                @else
                    <img src="{{ route('expenses.photo', $expense->id) }}" alt="" width="150px" class="mt-3">
                @endif

            @error('photo')
            <h5 class="pl-3 text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>

            @if ($expense->expense_date)
                <p class="w-full px-3 mb-6 md:mb-0 md:mt-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="expenseDate">Data do Comprovante</label>
                    <input type="text" id="expenseDate" name="expenseDate"
                           class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           value="{{ $expense->expense_date->format('d/m/Y H:i:s') }}" disabled>
                </p>
            @endif

        </div>
        <div class="w-full py-4 px-3 mb-6 md:mb-0">

            <button type="submit"
                    class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">Atualizar Registro</button>
        </div>
    </form>
</div>
