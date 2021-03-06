@extends('app')

@section('content')
    <!-- Page Content -->
    {!! Form::open(array( 'class' => 'form-horizontal', 'role' =>'form', 'enctype' => 'multipart/form-data')) !!}

    {!! Form::hidden('product_id', $itemInfo->item_id) !!}
    {!! Form::hidden('minimum_bid_amount', $itemInfo->min_bid) !!}

    <div class="container">
        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{!! $itemInfo->title !!}</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/750x500" alt="">
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Item Description</label>

                    <p>{!! $itemInfo->description !!}</p>
                </div>

                <div class="form-group">
                    <label>Bid Starts On</label>

                    <p>{!! date("m/d/Y H:i A",strtotime($itemInfo->bid_start_time)) !!}</p>
                </div>

                <div class="form-group">
                    <label>Bid Ends On</label>

                    <p>{!! date("m/d/Y H:i A",strtotime($itemInfo->bid_end_time)) !!}</p>
                </div>

                <div class="form-group">
                    <label>Minimum Bid Amount</label>

                    <p>{!! $itemInfo->min_bid !!}</p>
                </div>

                <div class="form-group">
                    <label class="pull-left">Your Bid: </label>

                    <div class="col-md-3">
                        <input type='text' class="form-control col-md-3" name="bid_amount"/>
                    </div>
                    <div class="col-md-3">
                        <input type='submit' class="btn btn-info" name="post_bid" value="Submit Your Bid"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        @if (count($relatedItemInfo) > 0 && !empty($relatedItemInfo))
            <div class="row">

                <div class="col-lg-12">
                    <h3 class="page-header">Related Items</h3>
                </div>
                @foreach($relatedItemInfo as $relatedItem)
                    <div class="col-sm-3 col-xs-6">
                        <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                        <h4>{!! HTML::link("item-details/" . $relatedItem->id, $relatedItem->title) !!}</h4>
                    </div>
                @endforeach

            </div>
        @else
            <div class="row">
                <div class="col-sm-3 col-xs-6">No Related Items Found</div>
            </div>
            @endif
                    <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Laravel Bidding Application</p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

    </div>
    {!! Form::close() !!}
    <!-- /.container -->
@endsection

