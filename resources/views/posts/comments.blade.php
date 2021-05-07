
                @if ($comments)
                <h4> Comments </h4>
          
                    @foreach ($comments as $comment)
                        <li> {{ $comment->description}} 

                        {{-- @if($comment->id == $comment->parent_id)
                            <ul>
                                <li>{{$comment->description }}</li>
                            </ul>
                        @endif --}}
                        </li>


                        
                        <form method="POST" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="description" class="form-control"/>
                                <input type="hidden" name="post_id" />
                                <input type="hidden" name="parent_id" />
                            </div>
        
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Reply"/>
                            </div>
        
                        </form>

                     @endforeach
             
                @endif


                <h4> Add Comment</h4>

                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="description"></textarea>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Comment">
                    </div>

                </form>