<div class="container-fixed">
    <div class="grid">
        <div class="card card-grid min-w-full">
            <div class="card-header py-5 flex-wrap">
                <h3 class="card-title">Team Members</h3>
                <div class="flex gap-6">
                    <div class="relative">
                        <i class="ki-outline ki-magnifier leading-none text-md text-gray-500 absolute top-1/2 left-0 -translate-y-1/2 ml-3"></i>
                        <input
                            class="input input-sm pl-8"
                            placeholder="Search Members"
                            type="text"
                            wire:model.live="search"
                        />
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div data-datatable="true" data-datatable-page-size="5">
                    <div class="scrollable-x-auto">
                        <table class="table table-auto table-border" data-datatable-table="true" id="grid_table">
                            <thead>
                                <tr>
                                    <th class="w-[60px]">
                                        <input class="checkbox checkbox-sm" data-datatable-check="true" type="checkbox"/>
                                    </th>
                                    <th class="min-w-[175px]">
                                        <span class="sort asc">
                                            <span class="sort-label">Name</span>
                                        </span>
                                    </th>
                                    <th class="min-w-[150px]">
                                        <span class="sort">
                                            <span class="sort-label">Address</span>
                                        </span>
                                    </th>
                                    <th class="min-w-[125px]">
                                        <span class="sort">
                                            <span class="sort-label">Phone Number</span>
                                        </span>
                                    </th>
                                    <th class="min-w-[125px]">
                                        <span class="sort">
                                            <span class="sort-label">Created At</span>
                                        </span>
                                    </th>
                                    <th class="w-[80px]"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-2.5">
                                                <div class="flex flex-col gap-0.5">
                                                    <a class="leading-none font-semibold text-sm text-gray-900 hover:text-primary" href="#">
                                                        {{ $user->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="leading-none text-gray-700">{{ $user->address }}</span>
                                        </td>
                                        <td>
                                            <span class="leading-none text-gray-700">{{ $user->phone_number }}</span>
                                        </td>
                                        <td>
                                            <span class="leading-none text-gray-700">{{ $user->created_at->format('d-m-Y') }}</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-light" href="#">Edit</a>
                                            <a class="btn btn-sm btn-danger" href="#">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer justify-center md:justify-between flex-col md:flex-row gap-3 text-gray-600 text-2sm font-medium">
                        <div class="flex items-center gap-2">
                            Show
                            <select class="select select-sm w-16" data-datatable-size="true" name="perpage"></select>
                            per page
                        </div>
                        <div class="flex items-center gap-4">
                            <span data-datatable-info="true"></span>
                            <div class="pagination" data-datatable-pagination="true"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
