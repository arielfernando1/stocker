<x-app-layout>
    <div class="flex justify-center">
        <div class="mb-4 text-center">
            <div class="bg-white p-7 shadow-lg rounded-xl text-center my-4">
                <h2 class="text-2xl font-semibold">Detalles del {{ $item->is_service ? 'Servicio' : 'Producto' }}</h2>
                <ul class="list-disc list-inside mt-4">
                    <li><i class="bi bi-plus"></i> Creado el: {{ $item->created_at }}</li>
                    @if ($item->created_at != $item->updated_at)
                    <li><i class="bi bi-arrow-clockwise"></i> Modificado el: {{ $item->updated_at }}</li>
                    @endif
                    <li><i class="bi bi-bookmark-fill"></i> PID: {{ $item->id }}</li>
                    <li>
                        @if ($sales && $sales->count() > 0)
                        {{ $sales->count() }} ventas
                        @else
                        Sin ventas
                        @endif
                    </li>
                </ul>
            </div>
            <div class="bg-white shadow-lg rounded-xl p-7">
                <form id="productForm" action="#" method="post">
                    @method('PATCH')
                    @csrf
                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                    @endif
                    @error('name')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('description')
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700">Categoria</label>
                        <select class="form-select" name="category_id" id="category_id">
                            <option value="{{ $item->category->id }}">{{ $item->category->name }}</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" class="form-input" placeholder=""
                            aria-describedby="helpId" value="{{ $item->name }}">
                    </div>
                    <div class="mb-4">
                        <label for="brand" class="block text-gray-700">Marca</label>
                        <input type="text" name="brand" id="brand" class="form-input" placeholder=""
                            aria-describedby="helpId" value="{{ $item->brand }}">
                    </div>
                    @if (!$item->is_service)
                    <div class="mb-4">
                        <label for="stock" class="block text-gray-700">Stock</label>
                        <input type="number" min="0" name="stock" id="stock" class="form-input"
                            placeholder="Existencias" aria-describedby="helpId" value="{{ $item->stock }}" disabled>
                    </div>
                    @endif
                    <div class="mb-4">
                        <label for="cost" class="block text-gray-700">Costo</label>
                        <input type="number" step="0.001" min="0.001" name="cost" id="cost" class="form-input"
                            placeholder="" aria-describedby="helpId" value="{{ $item->cost }}">
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700">Precio</label>
                        <input type="number" step="0.001" min="0.001" name="price" id="price" class="form-input"
                            placeholder="" aria-describedby="helpId" value="{{ $item->price }}">
                        <p id="helpId" class="text-gray-600">Precio de venta al público</p>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Descripcion</label>
                        <input type="text" name="description" id="description" class="form-input" placeholder=""
                            aria-describedby="helpId" value="{{ $item->description }}">
                    </div>
                    <button id="updateProduct" type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded m-3" disabled><i
                            class="bi bi-save-fill"></i> Actualizar</button>
                </form>
                <form id="deleteForm" action="{{route('items.destroy', $item->id)}}" method="post" class="inline-block">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded m-3"><i
                            class="bi bi-trash"></i> Eliminar</button>
                </form>
                <a href="{{ route('items.index') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded m-3"><i
                        class="bi bi-arrow-left"></i> Regresar</a>
            </div>

        </div>
    </div>
    @if ($sales->count() > 0)
    <div class="text-center my-8">
        <h4 class="text-2xl font-semibold">Historial de ventas</h4>
        <table class="w-full border-collapse border border-gray-300 mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b-2">Fecha</th>
                    <th class="px-4 py-2 border-b-2">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $sale->created_at }}</td>
                    <td class="px-4 py-2 border-b">{{ $sale->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif


    <script>
        // $('#deleteForm').submit(function(e) {
        //     e.preventDefault();
        //     Swal.fire({
        //         title: '¿Estas seguro?',
        //         icon: 'warning',
        //         text: "¡No podras revertir esto! Se eliminara el producto: {{ $item->name }} y todas sus ventas.",
        //         showCancelButton: true,
        //         confirmButtonColor: '#d33',
        //         cancelButtonColor: '#3085d6',
        //         confirmButtonText: 'Si, eliminar',
        //         cancelButtonText: 'Cancelar',
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 type: "POST",
        //                 url: "#",
        //                 data: $('#deleteForm').serialize(),
        //                 success: function(response) {
        //                     Swal.fire(
        //                         '¡Eliminado!',
        //                         'El producto ha sido eliminado.',
        //                         'success'
        //                     );
        //                     window.location.href = "{{ route('items.index') }}";
        //                 },
        //                 error: function(error) {
        //                     Swal.fire(
        //                         '¡Error!',
        //                         'El producto no ha sido eliminado.',
        //                         'error'
        //                     );
        //                 }
        //             });
        //         }
        //     });
        // });
        $('#deleteForm').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                icon: 'warning',
                text: "¡No podras revertir esto! Se eliminara el producto: {{ $item->name }} y todas sus ventas.",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    // submit the form
                    $('#deleteForm').unbind('submit').submit();

                }
            });
        });
        $('#productForm').change(function() {
            $('#productForm').data('changed', true);
        });
        $('#productForm').change(function() {
            $('#updateProduct').prop('disabled', false);
        });
        // $('#productForm').submit(function(e) {
        //     e.preventDefault();
        //     if ($('#productForm').valid()) {
        //         Swal.fire({
        //             title: 'Desea actualizar el producto?',
        //             text: "¡No podras revertir esto!",
        //             icon: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: '#d33',
        //             cancelButtonColor: '#3085d6',
        //             confirmButtonText: 'Si, actualizar',
        //             cancelButtonText: 'Cancelar',
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 $.ajax({
        //                     type: "POST",
        //                     url: "#",
        //                     data: $('#productForm').serialize(),
        //                     success: function(response) {
        //                         Swal.fire(
        //                             '¡Actualizado!',
        //                             'El producto ha sido actualizado.',
        //                             'success'
        //                         );
        //                         window.location.href =
        //                             "#";
        //                     },
        //                     error: function(error) {
        //                         Swal.fire(
        //                             '¡Error!',
        //                             'El producto no ha sido actualizado.',
        //                             'error'
        //                         );
        //                     }
        //                 });
        //             }
        //         })
        //     }
        // })
        var nameInput = document.getElementById('name');
        var brandInput = document.getElementById('brand');
        nameInput.addEventListener('keyup', function() {
            this.value = this.value.toUpperCase();
        });

        brandInput.addEventListener('keyup', function() {
            this.value = this.value.toUpperCase();
        });
        $('#productForm').validate({
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                brand: {
                    required: false,
                    minlength: 3,
                    maxlength: 50
                },
                stock: {
                    required: true,
                    min: 0,
                    max: 1000000
                },
                cost: {
                    required: false,
                    min: 0.001,
                    max: 1000000
                },
                price: {
                    required: true,
                    min: 0.001,
                    max: 1000000
                },
                description: {
                    required: false,
                    minlength: 3,
                    maxlength: 50
                }
            },
            messages: {
                name: {
                    required: 'Por favor ingrese un nombre',
                    minlength: 'El nombre debe tener al menos 3 caracteres',
                    maxlength: 'El nombre no debe exceder los 50 caracteres'
                },
                brand: {
                    required: 'Por favor ingrese una marca',
                    minlength: 'La marca debe tener al menos 3 caracteres',
                    maxlength: 'La marca no debe exceder los 50 caracteres'
                },
                stock: {
                    required: 'Por favor ingrese un stock',
                    min: 'El stock debe ser mayor o igual a 0',
                    max: 'El stock debe ser menor o igual a 1000000'
                },
                cost: {
                    required: 'Por favor ingrese un costo',
                    min: 'El costo debe ser mayor o igual a 0.001',
                    max: 'El costo debe ser menor o igual a 1000000'
                },
                price: {
                    required: 'Por favor ingrese un precio',
                    min: 'El precio debe ser mayor o igual a 0.001',
                    max: 'El precio debe ser menor o igual a 1000000'
                },
                description: {
                    required: 'Por favor ingrese una descripcion',
                    minlength: 'La descripcion debe tener al menos 3 caracteres',
                    maxlength: 'La descripcion no debe exceder los 50 caracteres'
                }
            }
        });




    </script>
</x-app-layout>
