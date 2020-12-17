<div class="max-w-7xl mx-auto py-15 px-4">

    <x-slot name="header">
        Meus Registros
    </x-slot>

    <div class="w-full mx-auto text-right mb-4">
        <a href="{{route('expenses.create')}}" class="flex-shrink-0 bg-green-500 hover:bg-green-700 border-green-700 hover:border-green-900 text-sm border text-white py-2 px-6 rounded">Criar Registro</a>
    </div>

    @include('includes.message')

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Descrição
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Valor
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Data Registro
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ações
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($expenses as $exp)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$exp->id}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$exp->description}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        <span class="{{ $exp->type == 1 ? 'text-green-600' : 'text-red-600' }}">R$ {{number_format($exp->amount, 2, ',', '.')}}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$exp->expense_date ?
                                        $exp->expense_date->format('d/m/Y H:i:s') :
                                        $exp->created_at->format('d/m/Y H:i:s')}}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{route('expenses.edit', $exp->id)}}" class="px-4 py-2 border rounded bg-teal-700 hover:bg-teal-900 text-white">Editar</a>
                                    <a href="#" wire:click.prevent="remove({{$exp->id}})"
                                       class="px-4 py-2 border rounded bg-red-500 text-white">Remover</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mx-auto mt-10">
        {{$expenses->links()}}
    </div>
</div>
