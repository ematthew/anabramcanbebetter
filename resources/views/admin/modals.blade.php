<!-- ADD NEW ARTICLE -->
<div class="modal fade" id="add-new-article-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Write an Article</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm">
	      	<form method="POST" onsubmit="return postNewArticle()">
            <input type="hidden" id="featured-images" name="">
    				<div class="form-group">
    					<label for="title">Title:</label>
    					<input type="text" class="form-control" id="title" placeholder="Title here..." name="title">
    				</div>

            <div class="form-group">
              <label for="catetory">Category</label>
              <select id="category" class="form-control">
                <option value="1">News</option>
                <option value="2">Entertainment</option>
                <option value="3">Politics</option>
                <option value="4">Musics</option>
                <option value="4">Celebrity</option>
              </select>
            </div>

    				<div class="form-group">
    					<label for="body">Body:</label>
    					<textarea id="body" name="body" class="form-control"></textarea>
    				</div>

            <div class="form-group">
              <a href="javascript:void(0);" id="upload_widget" class="btn btn-default">
                <i class="fa fa-camera"></i> Add Image
              </a>
            </div>

            <div class="form-group">
              <div id="preview-image"></div>
            </div>

    				<button type="submit" class="btn razo-btn btn-primary">publish</button>
    			</form>
	      </div>
      </div>
      <div class="modal-footer">
        <div class="pull-right">
          <button class="btn btn-flat" type="button" data-dismiss="modal">
            close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- EDIT ARTICLE -->
<div class="modal fade" id="edit-admin-article-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Edit Article</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm">
          <form method="POST" onsubmit="return updateAddedArticle()">
            <input type="hidden" id="edit_article_id" name="">
            <input type="hidden" id="edit_featured_images" name="">
            <div class="form-group">
              <label for="edit_title">Title:</label>
              <input type="text" class="form-control" id="edit_title" placeholder="Title here..." name="title">
            </div>

            <div class="form-group">
              <label for="edit_catetory">Category</label>
              <select id="edit_category" class="form-control">
                <option value="1">News</option>
                <option value="2">Entertainment</option>
                <option value="3">Politics</option>
                <option value="4">Musics</option>
                <option value="4">Celebrity</option>
              </select>
            </div>

            <div class="form-group">
              <label for="edit_body">Body:</label>
              <textarea id="edit_body" name="body" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <a href="javascript:void(0);" id="edit_upload_widget" class="btn btn-default">
                <i class="fa fa-camera"></i> Change Image
              </a>
            </div>

            <div class="form-group">
              <div id="edit-preview-image"></div>
            </div>

            <button type="submit" class="btn razo-btn btn-primary">publish</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <div class="pull-right">
          <button class="btn btn-flat" type="button" data-dismiss="modal">
            close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MUSIC UPLOAD -->
<div class="modal fade" id="add-new-music-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Upload Music</h4>
      </div>
      <div class="modal-body">
        <form method="POST" onsubmit="return uploadNewMusic()">
          <input type="hidden" id="audio_file" name="">
          <input type="hidden" id="audio_art" name="">
          <div class="form-group">
            <label for="track_title">Track Title </label>
            <input type="text" class="form-control" id="track_title" placeholder="Track Title" required="">
          </div>

          <div class="form-group">
            <label for="artist_name">Artiste Name </label>
            <input type="text" class="form-control" id="artiste_name" placeholder="Artiste Name" required="">
          </div>

          <div class="form-group">
            <label for="record_label">Record Label </label>
            <input type="text" class="form-control" id="record_label" placeholder="Record Label">
          </div>

          <div class="form-group">
            <label for="album_name">Album (Ignor for EP only) </label>
            <input type="text" class="form-control" id="album_name" placeholder="Album Name">
          </div>

          <div class="form-group">
            <label for="music_genre">Music Genre </label>
            <select id="music_genre" class="form-control">
              <option value="0">Hip-hop</option>
              <option value="1">Pop</option>
              <option value="2">Afro Pop</option>
              <option value="3">Regae</option>
              <option value="4">Jazz</option>
              <option value="5">Gospel</option>
              <option value="6">Fuji</option>
              <option value="7">Others</option>
            </select>
          </div>

          <div class="form-group">
            <label for="about_track">Describe Track</label>
            <textarea class="form-control" id="about_track" rows="3" required=""></textarea>
          </div>

          <div class="form-group">
            <label for="about_artiste">Describe Artiste <span class="small">(optional)</span></label>
            <textarea class="form-control" id="about_artiste" rows="3" required=""></textarea>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-sm-4">
                <a href="javascript:void(0);" id="upload_music_widget" class="btn btn-default">
                  <i class="fa fa-music"></i> Add Music
                </a>
              </div>
              <div class="col-sm-4">
                <a href="javascript:void(0);" id="upload_art_widget" class="btn btn-default">
                  <i class="fa fa-photo"></i> Track or Album Art
                </a>
              </div>
            </div>
            
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <div id="preview-audio"></div>
              </div>
              <div class="col-sm-6">
                <div id="preview-art"></div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <button class="btn razo-btn btn-primary">Upload</button>
          </div>

        </form>
        
      </div>
      <div class="modal-footer">
        <div class="pull-right">
          <button class="btn btn-flat" type="button" data-dismiss="modal">
            close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- EDIT MUSIC UPLOAD -->
<div class="modal fade" id="edit-admin-music-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Upload Music</h4>
      </div>
      <div class="modal-body">
        <form method="POST" onsubmit="return uploadNewMusic()">
          <input type="hidden" id="audio_file" name="">
          <input type="hidden" id="audio_art" name="">
          <div class="form-group">
            <label for="track_title">Track Title </label>
            <input type="text" class="form-control" id="track_title" placeholder="Track Title" required="">
          </div>

          <div class="form-group">
            <label for="artist_name">Artiste Name </label>
            <input type="text" class="form-control" id="artiste_name" placeholder="Artiste Name" required="">
          </div>

          <div class="form-group">
            <label for="record_label">Record Label </label>
            <input type="text" class="form-control" id="record_label" placeholder="Record Label">
          </div>

          <div class="form-group">
            <label for="album_name">Album (Ignor for EP only) </label>
            <input type="text" class="form-control" id="album_name" placeholder="Album Name">
          </div>

          <div class="form-group">
            <label for="music_genre">Music Genre </label>
            <select id="music_genre" class="form-control">
              <option value="0">Hip-hop</option>
              <option value="1">Pop</option>
              <option value="2">Afro Pop</option>
              <option value="3">Regae</option>
              <option value="4">Jazz</option>
              <option value="5">Gospel</option>
              <option value="6">Fuji</option>
              <option value="7">Others</option>
            </select>
          </div>

          <div class="form-group">
            <label for="about_track">Describe Track</label>
            <textarea class="form-control" id="about_track" rows="3" required=""></textarea>
          </div>

          <div class="form-group">
            <label for="about_artiste">Describe Artiste <span class="small">(optional)</span></label>
            <textarea class="form-control" id="about_artiste" rows="3" required=""></textarea>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-sm-4">
                <a href="javascript:void(0);" id="upload_music_widget" class="btn btn-default">
                  <i class="fa fa-music"></i> Add Music
                </a>
              </div>
              <div class="col-sm-4">
                <a href="javascript:void(0);" id="upload_art_widget" class="btn btn-default">
                  <i class="fa fa-photo"></i> Track or Album Art
                </a>
              </div>
            </div>
            
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <div id="preview-audio"></div>
              </div>
              <div class="col-sm-6">
                <div id="preview-art"></div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <button class="btn razo-btn btn-primary">Upload</button>
          </div>

        </form>
        
      </div>
      <div class="modal-footer">
        <div class="pull-right">
          <button class="btn btn-flat" type="button" data-dismiss="modal">
            close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ADD NEW USER -->
<div class="modal fade" id="add-new-user-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Create new User</h4>
            </div>
            <div class="modal-body">
                <form method="POST" id="create-user-form" onsubmit="return createNewUser()">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="firstname" placeholder="Eg Jones" class="form-control" name="first_name" required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="lastname" placeholder="Eg, Williams" class="form-control" name="last_name" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" placeholder="email@domain.com" class="form-control" name="email" required="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="eg, 0909884994" class="form-control" maxlength="11" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button class="btn btn-flat" type="button" data-dismiss="modal">
                      close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>