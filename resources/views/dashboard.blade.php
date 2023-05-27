<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 p-6 border border-grey-900 rounded-lg relative"><img
                        alt="" src="/billing/chart-dark.svg" class="absolute bottom-0 left-1/4 hidden lg:flex">
                    <div class="flex flex-col space-y-3">
                        <p class="text-lg font-semibold text-grey-900">Subscription</p>
                        @if (!$subscription)
                            <div>
                                <p class="text-sm text-grey-900">You are not subscribed to any plan</p>
                                <form action="/subscription/create" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="mt-2 w-fit block bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-2 px-2 rounded cursor-pointer">
                                        Setup
                                        Subscription</button>
                                </form>
                            </div>
                        @else
                            <div>
                                @if ($subscription->canceled())
                                    <p class="text-sm text-grey-900">Your subscription has been canceled</p>
                                    <p class="text-sm text-grey-900">It will end on {{ $subscription->ends_at }}, at
                                        which point your listings will no
                                        longer
                                        be public</p>
                                    <form action="/subscription/create" method="POST">
                                        @csrf
                                        <div class="flex gap-2 mt-2">
                                            <button type="submit"
                                                class="w-fit block bg-blue-500 hover:bg-blue-600 text-white text-sm font-bold py-2 px-2 rounded cursor-pointer">
                                                Re-subscribe</button>
                                            <a href="/billing-portal"
                                                class="w-fit block bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-bold p-2 rounded">
                                                Manage Payments
                                            </a>
                                        </div>
                                    </form>
                                @else
                                    <p class="text-sm text-grey-900">Your subscription will renew on
                                        {{ \Illuminate\Support\Carbon::createFromTimeStamp($subscription->asStripeSubscription()->current_period_end)->format('jS F Y') }}
                                    </p>
                                    <a href="/billing-portal"
                                        class="mt-2 w-fit block bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-bold p-2 rounded">
                                        Manage Payments
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="divide-y divide-gray-50 -mt-2 flex flex-col">
                        <div class="py-2 flex justify-between items-center">
                            <p class="text-sm text-gray-600">Number of Listings</p>
                            <p class="text-sm font-semibold">TODO</p>
                        </div>
                        <div class="py-2 flex justify-between items-center">
                            <p class="text-sm text-gray-600">Cost / Month</p>
                            <p class="text-sm font-semibold">TODO</p>
                        </div>
                    </div>
                </div>
            </div>
            <livewire:my-listings-table />
        </div>
    </div>
</x-app-layout>
