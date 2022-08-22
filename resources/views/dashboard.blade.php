@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>{{ $title }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Contact, email</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Function</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Phone</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created at</th>
                                    <th class="text-secondary opacity-7" style="width: 100px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/team-@php echo rand(1, 4); @endphp.jpg"
                                                    class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $contact->first_name }} {{
                                                    $contact->last_name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $contact->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $contact->position }}</p>
                                        <p class="text-xs text-secondary mb-0">{{ $contact->company }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $contact->phone
                                            }}</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $contact->created_at
                                            }}</span>
                                    </td>
                                    <td class="align-middle text-center p-3">
                                        @if ($contact->isFavourite || $route === 'favourite')
                                        <form action="{{ route('remove-favourite') }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                            <button type="submit"
                                                class="btn-loading btn bg-gradient-secondary w-100">Remove from
                                                Favourite</button>
                                        </form>
                                        @else
                                        <form action="{{ route('add-favourite') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                            <button class="btn-loading btn bg-gradient-success w-100">Add to
                                                Favourite</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $contacts->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        const loadingBtns = document.querySelectorAll('button.btn-loading');
        loadingBtns.forEach(element => {
            element.addEventListener("click", () => {
            element.innerText = 'Loading...';
            element.disabled = true;
            element.closest('form').submit();
        });
        }); 
    </script>
@endsection