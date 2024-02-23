@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-blue-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 dark:text-gray-300 dark:placeholder-gray-400 dark:focus:placeholder-gray-500 dark:disabled:bg-gray-600 dark:disabled:text-gray-400 dark:disabled:placeholder-gray-500 dark:disabled:border-gray-600 dark:disabled:opacity-50']) !!}>
