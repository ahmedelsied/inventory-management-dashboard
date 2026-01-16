<x-filament-panels::page>
    <div class="space-y-4">
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-900">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Item</th>
                        <th class="px-4 py-3 text-right text-sm font-semibold text-gray-700 dark:text-gray-200">Quantity</th>
                        <th class="px-4 py-3 text-right text-sm font-semibold text-gray-700 dark:text-gray-200">Price</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse ($items as $item)
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">{{ $item->name }}</td>
                            <td class="px-4 py-3 text-right text-sm text-gray-900 dark:text-gray-100">{{ $item->qty }}</td>
                            <td class="px-4 py-3 text-right text-sm text-gray-900 dark:text-gray-100">
                                {{ number_format((float) $item->price, 2) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-6 text-center text-sm text-gray-500 dark:text-gray-400" colspan="3">
                                No items available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-filament-panels::page>
