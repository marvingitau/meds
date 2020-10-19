<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<div class="left-sidebar">
    <?php
        // $categories=DB::table('product__categories')->where([['status',1],['parent_id',0]])->get();
        $categories = DB::table('list_of_product_class_descriptions_Sheet')->get()->toArray();
    ?>
    <h2 style="padding-top: 4rem;">Category</h2>




    <div class="panel-group category-products products-page-cat" id="accordian"
    style="
        height: 20rem;
        overflow-y: scroll;
        "
    ><!--category-productsr-->
        @if(count($categories)>0)
        {{-- <div id="sportswear{{$category->id}}" class="panel-collapse collapse"> --}}
            <div class="panel-body">
                <ul>
                    @foreach($categories as $category)
                        <li><a href="{{route('cats',$category->Product_class)}}">{{$category->Description}} </a></li>
                    @endforeach
                </ul>
            </div>
        {{-- </div> --}}
        @endif
        {{-- @foreach($categories as $category)
            <php
               $sub_categories=DB::table('product__categories')->select('id','name')->where([['parent_id',$category->id],['status',1]])->get();
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear{{$category->id}}">
                            @if(count($sub_categories)>0)
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            @endif
                        </a>
                            <a href="{{route('cats',$category->id)}}">{{$category->name}}</a>

                    </h4>
                </div>
                @if(count($sub_categories)>0)
                    <div id="sportswear{{$category->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($sub_categories as $sub_category)
                                    <li><a href="{{route('cats',$sub_category->id)}}">{{$sub_category->name}} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach --}}
    </div><!--/category-products-->

</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
