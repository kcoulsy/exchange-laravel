<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-500 hover:bg-blue-600 text-white h-10 px-4 py-2']) }}>
    {{ $slot }}
</button>
