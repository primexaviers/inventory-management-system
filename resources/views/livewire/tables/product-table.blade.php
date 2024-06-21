<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                {{ __('Products') }}
            </h3>
        </div>

        <div class="card-actions btn-group">
            <div class="dropdown">
                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <x-icon.vertical-dots />
                </a>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <a href="{{ route('products.create') }}" class="dropdown-item">
                        <x-icon.plus />
                        {{ __('Create Product') }}
                    </a>
                    <a href="{{ route('products.import.view') }}" class="dropdown-item">
                        <x-icon.plus />
                        {{ __('Import Products') }}
                    </a>
                    <a href="{{ route('products.export.store') }}" class="dropdown-item">
                        <x-icon.plus />
                        {{ __('Export Products') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-secondary">
                Show
                <div class="mx-2 d-inline-block">
                    <select wire:model.live="perPage" class="form-select form-select-sm" aria-label="result per page">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                    </select>
                </div>
                entries
            </div>
            <div class="ms-auto text-secondary">
                Search:
                <div class="ms-2 d-inline-block">
                    <input type="text" wire:model.live="search" class="form-control form-control-sm"
                        aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>

    <x-spinner.loading-spinner />

    <div class="table-responsive">
        <table wire:loading.remove class="table table-bordered card-table table-vcenter text-nowrap datatable">
            <thead class="thead-light">
                <tr>
                    <th class="align-middle text-center w-1">
                        {{ __('No.') }}
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('partNumber')" href="#" role="button">
                            {{ __('PartNumber') }}
                            @include('inclues._sort-icon', ['field' => 'partNumber'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('name')" href="#" role="button">
                            {{ __('Name') }}
                            @include('inclues._sort-icon', ['field' => 'name'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('stock')" href="#" role="button">
                            {{ __('Stock') }}
                            @include('inclues._sort-icon', ['field' => 'stock'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('satuan')" href="#" role="button">
                            {{ __('Satuan') }}
                            @include('inclues._sort-icon', ['field' => 'satuan'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('rack')" href="#" role="button">
                            {{ __('Rack') }}
                            @include('inclues._sort-icon', ['field' => 'rack'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('jenis')" href="#" role="button">
                            {{ __('Jenis') }}
                            @include('inclues._sort-icon', ['field' => 'jenis'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('merk')" href="#" role="button">
                            {{ __('Merk') }}
                            @include('inclues._sort-icon', ['field' => 'merk'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('buying_price')" href="#" role="button">
                            {{ __('Harga Pokok') }}
                            @include('inclues._sort-icon', ['field' => 'buying_price'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('sell_price')" href="#" role="button">
                            {{ __('Harga Jual') }}
                            @include('inclues._sort-icon', ['field' => 'sell_price'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('category_id')" href="#" role="button">
                            {{ __('Tipe') }}
                            @include('inclues._sort-icon', ['field' => 'category_id'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('notes')" href="#" role="button">
                            {{ __('Keterangan') }}
                            @include('inclues._sort-icon', ['field' => 'notes'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="align-middle text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->part_number }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->name }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->quantity }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->unit ? $product->unit->name : '--' }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->rack }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->jenis }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->merk }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->buying_price }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->buying_price }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->category ? $product->category->name : '--' }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $product->notes }}
                        </td>
                        <td class="align-middle text-center" style="width: 10%">
                            <x-button.show class="btn-icon" route="{{ route('products.show', $product->uuid) }}" />
                            <x-button.edit class="btn-icon" route="{{ route('products.edit', $product->uuid) }}" />
                            <x-button.delete class="btn-icon" route="{{ route('products.destroy', $product->uuid) }}"
                                onclick="return confirm('Are you sure to delete product {{ $product->name }} ?')" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="align-middle text-center" colspan="7">
                            No results found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-secondary">
            Showing <span>{{ $products->firstItem() }}</span>
            to <span>{{ $products->lastItem() }}</span> of <span>{{ $products->total() }}</span> entries
        </p>

        <ul class="pagination m-0 ms-auto">
            {{ $products->links() }}
        </ul>
    </div>
</div>
