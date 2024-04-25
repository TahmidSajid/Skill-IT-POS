<div>
    <div class="profile-set">
        <div class="profile-head">
        </div>
        <div class="profile-top">
            <div class="profile-content">
                <form wire:submit="saveImg">
                    <div wire:ignore>
                        <div class="profile-contentimg">
                            @if (auth()->user()->photo)
                                <img src="{{ asset('uploads/profile_photos') }}/{{ auth()->user()->photo }}"
                                    alt="img" id="blah">
                            @else
                                <img src="{{ asset('default_photos/default_profile.png') }}" alt="img" id="blah">
                            @endif
                            <div class="profileupload">
                                <input type="file" id="imgInp" wire:model="profileImg">
                                <a href="javascript:void(0);"><img src="assets/img/icons/edit-set.svg"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-contentname">
                        <h2>{{ $userName }}</h2>
                        <h4>{{ $userRole }}</h4>
                    </div>
                    <div class="profile-contentname mt-4 pt-3">
                        @if ($profileImg)
                            <button class="btn btn-submit" type="submit">Change picture</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
