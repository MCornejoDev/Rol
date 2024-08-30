@props(['items', 'title', 'model', 'optionId', 'optionLabel', 'optionDescription'])

<div x-data="form()" x-init="options = JSON.parse('{{ json_encode($items) }}');
model = '{{ $model }}'">
    <label for="custom-select" class="block mb-2 text-sm font-medium text-base-content">
        {{ $title }}
    </label>

    <!-- Botón para abrir el dropdown -->
    <div class="relative">
        <button @click="open = !open"
            class="relative w-full py-2 pl-3 pr-10 text-left border rounded-md shadow-sm cursor-pointer
            {{ $errors->has($model) ? 'border-red-500 ' : 'border-base-300 bg-base-300' }}
            border-base-300 bg-base-300 focus:outline-none focus:ring-1 focus:ring-base-300 focus:border-base-300 sm:text-sm">
            <span
                x-text="selected ? `${selected.{{ $optionLabel }}} - ${selected.{{ $optionDescription }}}` : '{{ $title }}'"
                class="block truncate"></span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <x-icon name="chevron-down" class="w-5 h-5 text-base-content" x-show="open" />
                <x-icon name="chevron-up" class="w-5 h-5 text-base-content" x-show="!open" />
            </span>
        </button>

        <!-- Opciones del dropdown -->
        <div x-show="open" @click.away="open = false"
            class="absolute z-10 w-full mt-1 border rounded-md shadow-lg bg-base-100 border-base-content/30 ">
            <ul
                class="py-1 overflow-auto rounded-md text-base-content max-h-60 ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                <template x-for="(option, index) in options" :key="option.id + '-' + index">
                    <li x-on:click="handleSelect(option)"
                        :class="{
                            'text-base-content bg-base-300': selected && selected.id === option.id,
                            'text-base-content hover:bg-base-300 hover:text-base-content': !(selected && selected.id ===
                                option.id)
                        }"
                        class="relative py-2 pl-3 cursor-pointer select-none pr-9 hover:text-base-content text-base-content">
                        <div class="flex flex-col">
                            <span x-text="option.{{ $optionLabel }}"
                                :class="{
                                    'font-semibold': selected && selected.id === option.id,
                                    'font-normal': !(selected && selected.id === option.id)
                                }"
                                class="block"></span>
                            <span x-text="option.{{ $optionDescription }}" class="text-sm text-base-content"></span>
                        </div>
                    </li>
                </template>
            </ul>
        </div>
    </div>

    @error($model)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>