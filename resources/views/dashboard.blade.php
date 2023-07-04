<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-6 ">
                <a href="{{ route('circular.index') }}" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">
                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">{{ \App\Models\Circular::count() }}</div>

                                <div class="mt-1 text-base font-extrabold text-black">
                                    Total Circulars
                                </div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="https://img.icons8.com/?size=128&id=42795&format=png" alt="employees on leave" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('manual.index') }}" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">
                    <div class="p-5 ">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{ \App\Models\Manual::count() }}
                                </div>
                                <div class="mt-1 text-base  font-extrabold text-black">Manuals</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">

                                <img src="https://img.icons8.com/?size=128&id=103813&format=png" alt="legal case" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('hrd.index') }}" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">
                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{\App\Models\Hrd::count()}}
                                </div>
                                <div class="mt-1 text-base  font-extrabold text-black">HRD Documents</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">
                                <img src="https://img.icons8.com/?size=128&id=0wWKj9pXfCqc&format=png" alt="legal case" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="{{ route('download.index') }}" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">

                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    {{\App\Models\Download::count()}}
                                </div>
                                <div class="mt-1 text-base font-extrabold text-black">Downloads</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">

                                <img src="https://img.icons8.com/?size=128&id=42798&format=png" alt="legal case" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="https://www.sbp.org.pk/circulars/cir.asp" target="_blank" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">
                    <div class="p-5">
                        <div class="grid grid-cols-3 gap-1 ">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    &nbsp;
                                </div>
                                <div class="mt-1 text-base font-extrabold text-black">SBP Circulars</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">

                                <img src="{{ \Illuminate\Support\Facades\Storage::url('sbp.png') }}" alt="legal case" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
                <a href="https://www.sbp.org.pk/publications/prudential/index.htm" target="_blank" class="transform  hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white">
                    <div class="p-5" >
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2">
                                <div class="text-3xl font-bold leading-8">
                                    &nbsp;
                                </div>
                                <div class="mt-1 text-base font-extrabold text-black">SBP - PR's</div>
                            </div>
                            <div class="col-span-1 flex items-center justify-end">

                                <img src="{{ \Illuminate\Support\Facades\Storage::url('sbp.png') }}" alt="legal case" class="h-12 w-12">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-4 pt-8">
                <div class="bg-white  shadow-xl rounded-lg p-4" id="chart">
                    <div id="chart"></div>
                </div>

                <div class="bg-white  shadow-xl rounded-lg p-4" id="chart2">
                    <div id="chart2"></div>
                </div>
            </div>

        </div>
    </div>

    @push('modals')
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>

            var options = {
                series: [@foreach($total_group_by_division as $division) {{$division->total}}, @endforeach],
                chart: {
                    width: 500,
                    height: 300,
                    type: 'pie',
                },
                labels: [@foreach($total_group_by_division as $division) '{{$division->short_name}}', @endforeach],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 500
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();


            var options2 = {
                series: [{
                    name: 'Total    ',
                    data: [@foreach($total_circular as $circular) {{$circular->total_count}}, @endforeach]
                }],
                chart: {
                    type: 'bar',
                    height: 300,
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: [@foreach($total_circular as $circular) '{{$circular->month}}', @endforeach],
                },
                yaxis: {
                    title: {
                        text: 'Total. (Circulars) last 6 months'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "" + val + " "
                        }
                    }
                }
            };

            var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
            chart2.render();


        </script>
    @endpush
</x-app-layout>
