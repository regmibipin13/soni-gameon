<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __(isset($label) ? $label : '') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
