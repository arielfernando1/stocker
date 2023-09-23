<div>
    <div class="max-w-3xl mx-auto mb-2">
        <div class="bg-white rounded-lg">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="text-center">
                    <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                        Using Select2 with Laravel Livewire
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-3xl mx-auto mb-2">
        <div class="bg-white rounded-lg p-5">

            <div class="grid sm:grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div wire:ignore>
                    <select class="form-control" id="select2">
                        <option value="">Select Option</option>
                        @foreach($series as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    You have selected: <strong>{{ $selected }}</strong>
                </div>
            </div>


        </div>
    </div>

</div>


    <script>
        $(document).ready(function () {
            $('#select2').select2();
            $('#select2').on('change', function (e) {
                var data = $('#select2').select2("val");
            @this.set('selected', data);
            });
        });
    </script>


