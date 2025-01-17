@extends('user.layouts.master')

@section('content')
    <!-- Single Product Start -->
    <div class="mt-5 text-white">hello</div>
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-1 col-xl-1"></div>
                <div class="col-lg-10 col-xl-10">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <a href="#">
                                    <img src="{{ asset('product_img/' . $product->image) }}"
                                        class="img-fluid rounded w-100 img-thumbnail" alt="Image" style="height:450px;">
                                </a>
                            </div>
                        </div>
                        <div class="col"></div>
                        <div class="col-lg-5">
                            <h4 class="fw-bold mb-3">
                                {{ $product->name }}<small class="text-danger"
                                    style="margin-left: 10px;">{{ $product->stock < 5 ? 'Only ' . $product->stock . ' left!' : '' }}</small>
                            </h4>
                            <p class="mb-3">Category : {{ $product->category_name }}</p>
                            <h5 class="fw-bold mb-3">{{ $product->price }} mmk</h5>
                            <div class="d-flex mb-4">
                                <div>
                                    @php
                                        $star = number_format($rating);
                                    @endphp
                                    @for ($i = 0; $i < $star; $i++)
                                        <i class="fa fa-star text-secondary"></i>
                                    @endfor
                                    @for ($i = $star + 1; $i <= 5; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </div>

                                <div class="mx-4">
                                    <i class="fa-solid fa-eye mx-2"> {{ $view_count }}</i>
                                </div>

                            </div>
                            <p class="mb-4">{{ Str::words($product->description, 20, '...') }}</p>

                            <form action="{{ route('product#addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input name="qty" type="text"
                                        class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                </button>

                                {{-- //rating modal --}}
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                                    <i class="fa-regular fa-star me-2 text-primary"></i>
                                    Rating
                                </button>

                            </form>

                            <form action="{{ route('product#rating') }}" method="POST">
                                @csrf
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog  modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Rate this Product !</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="rating-css">

                                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                    <div class="star-icon">

                                                        @if ($user_rating == 0)
                                                            <input type="radio" value="1" name="productRating"
                                                                checked id="rating1">
                                                            <label for="rating1"><i class="fa-solid fa-star"></i></label>

                                                            <input type="radio" value="2" name="productRating"
                                                                id="rating2">
                                                            <label for="rating2"><i class="fa-solid fa-star"></i></label>

                                                            <input type="radio" value="3" name="productRating"
                                                                id="rating3">
                                                            <label for="rating3"><i class="fa-solid fa-star"></i></label>

                                                            <input type="radio" value="4" name="productRating"
                                                                id="rating4">
                                                            <label for="rating4"><i class="fa-solid fa-star"></i></label>

                                                            <input type="radio" value="5" name="productRating"
                                                                id="rating5">
                                                            <label for="rating5"><i class="fa-solid fa-star"></i></label>
                                                        @else
                                                            @php
                                                                $userRating = number_format($user_rating);
                                                            @endphp

                                                            @for ($i = 1; $i <= $userRating; $i++)
                                                                <input type="radio" value="{{ $i }}" checked
                                                                    name="productRating" id="rating{{ $i }}">
                                                                <label for="rating{{ $i }}"><i
                                                                        class="fa-solid fa-star"></i></label>
                                                            @endfor

                                                            @for ($j = $userRating + 1; $j <= 5; $j++)
                                                                <input type="radio" value="{{ $j }}"
                                                                    name="productRating" id="rating{{ $j }}">
                                                                <label for="rating{{ $j }}"><i
                                                                        class="fa-solid fa-star"></i></label>
                                                            @endfor
                                                        @endif

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Rate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div>
                            <p class="mb-1"><button
                                    class="btn btn-secondary btn-sm rounded-5 shadow-sm text-white">{{ $view_count }}</button>
                                people views this product!</p>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active  border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-about" aria-controls="nav-about"
                                        aria-selected="true">Description</button>
                                    <button class="nav-link  border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                        aria-controls="nav-mission" aria-selected="false">Customers Comments <span
                                            class="btn btn-secondary btn-sm text-white shadow-sm rounded-5 "
                                            style="">{{ count($comment_data) }}</span></button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
                                    <p>{{ $product->description }}</p>
                                </div>
                                {{-- comment box --}}

                                <div class="tab-pane" id="nav-mission" role="tabpanel"
                                    aria-labelledby="nav-mission-tab">
                                    @foreach ($comment_data as $item)
                                        <div class="d-flex">
                                            <img src="{{ $item->profile ? asset('profile_img/' . $item->profile) : asset('admin/img/undraw_profile.svg') }}"
                                                class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;"
                                                alt="">
                                            <div class="card-body">
                                                <p class="mb-2" style="font-size: 14px;">{{ $item->created_at }}</p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>{{ $item->name ? $item->name : $item->nickname }}</h5>

                                                    @if ($item->user_id == Auth::user()->id)
                                                        <div>
                                                            <a href="{{ route('comment#delete', $item->comment_id) }}"
                                                                class="btn btn-danger btn-sm shadow-sm text-white"><i
                                                                    class="fa-solid fa-trash"></i></a>
                                                        </div>
                                                    @endif
                                                </div>
                                                <p>{{ $item->message }}</p>
                                                <hr>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                        </div>
                        <form action="{{ route('product#comment') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <h4 class="mb-2 fw-bold">Leave Comments</h4>
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-2">
                                        <textarea name="comment" id="" class="form-control border" cols="30" rows="8"
                                            placeholder="Your Review for this product" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3">Please rate:</p>
                                            <div class="d-flex align-items-center" style="font-size: 12px;">
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <button class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                            Post
                                            Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            @if (count($relatedProduct) != 0)
                <h1 class="fw-bold mb-0">Related products</h1>
            @endif
            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    @foreach ($relatedProduct as $item)
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="{{ asset('product_img/' . $item->image) }}" class="img-fluid w-100 rounded-top"
                                    alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                style="top: 10px; right: 10px;">{{ $item->category_name }}</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>{{ $item->name }}</h4>
                                <p>{{ Str::words($item->description, 20, '...') }}</p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold">{{ $item->price }} mmk </p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product End -->
@endsection
