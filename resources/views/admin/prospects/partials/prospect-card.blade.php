<div class="card mt-3 prospect-card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                @if ($prospect->profile_image)
                    <img src="{{ Storage::url($prospect->profile_image) }}" style="max-width: 100%; max-height:100px;"
                        alt="">
                @else
                    <img src="/images/user.png" style="max-width: 100%; max-height:100px;" alt="">
                @endif
            </div>
            <div class="col-sm-6">
                <h5>{{ $prospect->name }}</h5>
                <ul>
                    <li>
                        <strong>Email: </strong>{{ $prospect->email }}
                    </li>
                    <li>
                        <strong>Date Added: </strong>{{ $prospect->pretty_created }}
                    </li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="dropdown d-block">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                        id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"
                                href="{{ route('admin.prospects.edit', ['prospect' => $prospect->id]) }}">Edit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
