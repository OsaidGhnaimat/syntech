<form wire:submit.prevent="submit">
    <div class="modal-body mt-4">
        <div class="input-group mb-2 flex">
            <label class="btn btn-input" style="width: 115px;" for="name">User Name</label>
            <input class="input" type="text" wire:model="name" name="name" />
        </div>
        <div class="mb-4" style="margin-left: 115px;">
            @error('name') <span class="text-danger text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="input-group mb-2 flex">
            <label class="btn btn-input" style="width: 115px;" for="email">Email</label>
            <input class="input" type="email" wire:model="email" name="email" />
        </div>
        <div class="mb-4" style="margin-left: 115px;">
            @error('email') <span class="text-danger text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="input-group mb-2 flex">
            <label class="btn btn-input" style="width: 115px;" for="password">Password</label>
            <input class="input" type="password" wire:model="password" name="password" />
        </div>
        <div class="mb-4" style="margin-left: 115px;">
            @error('password') <span class="text-danger text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="input-group mb-2 flex">
            <label class="btn btn-input" style="width: 115px;" for="address">Address</label>
            <input class="input" type="text" wire:model="address" name="address" />
        </div>
        <div class="mb-4" style="margin-left: 115px;">
            @error('address') <span class="text-danger text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="input-group flex mb-2">
            <label class="btn btn-input" style="width: 115px;" for="phone_number">Phone Number</label>
            <input class="input" type="number" wire:model="phone_number" name="phone_number" />
        </div>
        <div class="mb-4" style="margin-left: 115px;">
            @error('phone_number') <span class="text-danger text-sm">{{ $message }}</span> @enderror
        </div>

    </div>
    <div class="modal-footer justify-end">
        <div class="flex gap-4">
            <button class="btn btn-primary" type="submit">Create</button>
            <button class="btn btn-light" data-modal-dismiss="true" type="button" wire:click="closeModal">
                Cancel
            </button>
        </div>
    </div>


</form>
