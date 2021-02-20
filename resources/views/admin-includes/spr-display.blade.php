<p style="text-align:center;color:red;font-size:15px;"><b>Note:</b> Minimum of three (3) post per socail medial section for it to display on the home page</p>

<div class="card">
    <div class="card-header">Twitter</div>

    <div class="card-body">
        <div class="row">
            @foreach($sprs as $spr)
            @if($spr['social_media']== 'Twitter')
            <div class="col-md-4" style="padding:5px;">
                <div style="border-style: solid;">
                    @if($spr['file_type']== 'jpg' || $spr['file_type']== 'jpeg' || $spr['file_type']== 'png')
                    <img src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" alt="{{ $spr->caption }}" style="max-width:100%;height:175px;">
                    @else
                    <video width="100%" controls>
                        <source src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" type="video/{{ $spr['file_type'] }}">
                    Your browser does not support HTML video.
                    </video>
                    @endif
                    <a href="post/delete/{{ $spr->id }}" type="button" class="btn btn-primary float-right btn-sm">Delete</a>
                    <p>{{ $spr->caption }}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<br/>
<div class="card">
    <div class="card-header">Instagram</div>

    <div class="card-body">
        <div class="row">
            @foreach($sprs as $spr)
            @if($spr['social_media']== 'Instagram')
            <div class="col-md-4" style="padding:5px;">
                <div style="border-style: solid;">
                    @if($spr['file_type']== 'jpg' || $spr['file_type']== 'jpeg' || $spr['file_type']== 'png')
                    <img src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" alt="{{ $spr->caption }}" style="max-width:100%;max-height:175px;">
                    @else
                    <video width="100%" controls>
                        <source src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" type="video/{{ $spr['file_type'] }}">
                    Your browser does not support HTML video.
                    </video>
                    @endif
                    <a href="post/delete/{{ $spr->id }}" type="button" class="btn btn-primary float-right btn-sm">Delete</a>
                    <p>{{ $spr->caption }}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<br/>
<div class="card">
    <div class="card-header">Facebook</div>

    <div class="card-body">
        <div class="row">
            @foreach($sprs as $spr)
            @if($spr['social_media']== 'Facebook')
            <div class="col-md-4" style="padding:5px;">
                <div style="border-style: solid;">
                    @if($spr['file_type']== 'jpg' or $spr['file_type']== 'jpeg' or $spr['file_type']== 'png')
                    <img src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" alt="{{ $spr->caption }}" style="max-width:100%;max-height:175px;">
                    @else
                    <video width="100%" controls>
                        <source src="{{url('')}}/uploads/spr_posts/{{ $spr->file_name }}" type="video/{{ $spr['file_type'] }}">
                    Your browser does not support HTML video.
                    </video>
                    @endif
                    <a href="post/delete/{{ $spr->id }}" type="button" class="btn btn-primary float-right btn-sm">Delete</a>
                    <p>{{ $spr->caption }}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>