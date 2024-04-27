<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>User name </th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->moderators as $key => $moderator)
                        <tr>
                            <td class="productimgname">
                                @if ($moderator->photo)
                                    <a href="{{ asset('uploads/profile_photos') }}/{{ $moderator->photo }}"
                                        class="product-img image-popup">
                                        <img class="img-fluid"
                                            src="{{ asset('uploads/profile_photos') }}/{{ $moderator->photo }}"
                                            alt="img">
                                    </a>
                                @else
                                    <a href="{{ asset('default_photos/default_profile.png') }}"
                                        class="product-img image-popup">
                                        <img class="img-fluid" src="{{ asset('default_photos/default_profile.png') }}"
                                            alt="img">
                                    </a>
                                @endif
                                {{ $moderator->name }}
                            </td>
                            <td>
                                @if ($moderator->phone)
                                    {{ $moderator->phone }}
                                @else
                                    <span>Not added yet</span>
                                @endif
                            </td>
                            <td>{{ $moderator->email }}</td>
                            <td>{{ $moderator->role }}</td>
                            <td>
                                @if (auth()->user()->id != $moderator->id && $loop->iteration != 1)
                                    <button class="me-3 bg-transparent border-0" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $key }}"
                                        wire:click="edit({{ $moderator->id }})">
                                        <img src="assets/img/icons/edit.svg" alt="img">
                                    </button>
                                    <!-- Modal -->
                                    <!-- student edit form start
                                ================================================== -->
                                    @include('components.dashboard.moderator-edit')
                                    <!-- student edit form end
                                ================================================== -->
                                    <button type="button" class="me-3 confirm-text bg-transparent border-0"
                                        wire:click="delete({{ $moderator->id }})">
                                        <img src="{{ asset('assets') }}/img/icons/delete.svg" alt="img">
                                    </button>
                                    @if ($moderator->role == 'moderator')
                                        <button type="button" class="me-3 confirm-text btn btn-sm btn-primary"
                                            wire:click="makeAdmin({{ $moderator->id }})">
                                            Make Admin
                                        </button>
                                    @else
                                        <button type="button" class="me-3 confirm-text btn btn-sm btn-primary"
                                            wire:click="makeModerator({{ $moderator->id }})">
                                            Make Moderator
                                        </button>
                                    @endif
                                @else
                                    <span>Not Available right now</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    <tr>
                        <td colspan="5">
                            {{ $this->moderators->links() }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('pluginCss')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/lightbox/glightbox.min.css">
@endpush
@push('pluginJs')
    <script src="{{ asset('assets') }}/plugins/lightbox/glightbox.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/plugins/lightbox/lightbox.js" type="text/javascript"></script>
@endpush
@push('paginationCss')
    <style rel="stylesheet">
        .pagination {
            color: white !important;
        }

        .page-link {
            color: white !important;
            background: #868484 !important;
        }

        .page-item.active .page-link {
            border: 0px !important;
            color: black !important;
            background: #ff9f43 !important;
            transform: scale(1.2);
            transition: 0.5s
        }
    </style>
@endpush
