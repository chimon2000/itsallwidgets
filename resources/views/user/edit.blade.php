@extends('master')

@section('title', 'Flutter Pro')
@section('description', 'A Showcase for Passionate Flutter Developers')
@section('image_url', asset('images/background.jpg'))

@section('header_title', 'A Showcase for Passionate Flutter Developers')
@section('header_button_url', iawUrl() . '/auth/google?intended_url=profile/edit')
@section('header_button_label', 'MANAGE PROFILE')
@section('header_button_icon', 'fas fa-user')

@section('header_subtitle')
    Profiles are sourced from
        <a href="{{ fxUrl() }}">FlutterX</a>,
        <a href="{{ feUrl() }}">Flutter Events</a> and
        <a href="{{ iawUrl() }}">It's All Widgets!</a>
@endsection

@section('content')

	<script>
	function onFormSubmit() {
		$('#saveButton').addClass('is-loading').prop('disabled', true);
	}
	</script>

    <section class="hero is-light is-small is-body-font">
        <div class="hero-body">
            <div class="container">
                <div class="column is-8 is-offset-2">
                    <h2 class="title">Developer Profile</h2>
                </div>
            </div>
        </div>
    </section>

    <p>&nbsp;</p>
	<p>&nbsp;</p>


	<div class="container is-body-font">
		<div class="column is-8 is-offset-2">

			@if (isset($errors) && $errors->count())
				<div class="notification is-warning">
					Please correct the errors and try again.
				</div>
				<p>&nbsp;</p>
			@endif

			<div class="subtitle">Required Fields</div>

			{{ Form::open(['url' => url('/profile'), 'method' => 'PUT', 'files' => true, 'onsubmit' => 'onFormSubmit()']) }}

			<article class="message is-dark is-elevated">
				<div class="message-body">

					<div class="field">
						<label class="label" for="name">
							Name
						</label>
						<div class="control has-icons-left">
							{{ Form::text('name', $user->name, ['class' => 'input', 'required' => true]) }}

							<span class="icon is-small is-left">
								<i class="fas fa-user"></i>
							</span>

							@if ($errors->has('name'))
								<span class="help is-danger">
									{{ $errors->first('name') }}
								</span>
							@endif
						</div>
					</div>

					<div class="field">
						<label class="label" for="handle">
							Handle
						</label>
						<div class="control has-icons-left">
							{{ Form::text('handle', $user->handle, ['class' => 'input', 'required' => true]) }}

							<span class="icon is-small is-left">
								<i class="fas fa-at"></i>
							</span>

                            <span class="help">
                                Profile Link <a href="https://flutterpro.dev/{{ $user->handle }}" target="_blank">https://flutterpro.dev/{{ $user->handle }}</a>
                            </span>

							@if ($errors->has('handle'))
								<span class="help is-danger">
									{{ $errors->first('handle') }}
								</span>
							@endif
						</div>
					</div>

					<div class="field">
						<label class="label" for="title">
							Sources
						</label>
						<div class="control">
							<div style="padding-bottom:14px;padding-top:4px;">
                                <label class="checkbox">
                                    {{ Form::hidden('is_pro_iaw', 0) }}
    								<input name="is_pro_iaw" type="checkbox" value="1" {{ $user->is_pro_iaw ? 'CHECKED' : '' }}> Applications
                                </label>
                                <div class="help">
                                    Sourced from <a href="https://itsallwidgets.com" target="_blank">https://itsallwidgets.com</a>
                                </div>
							</div>

							<div style="padding-bottom:14px">
                                <label class="checkbox">
                                    {{ Form::hidden('is_pro_fx', 0) }}
    								<input name="is_pro_fx" type="checkbox" value="1" {{ $user->is_pro_fx ? 'CHECKED' : '' }}> Resources
                                </label>
                                <div class="help">
                                    Sourced from <a href="https://flutterx.com" target="_blank">https://flutterx.com</a>
                                </div>
							</div>

							<div>
                                <label class="checkbox">
                                    {{ Form::hidden('is_pro_fe', 0) }}
    								<input name="is_pro_fe" type="checkbox" value="1" {{ $user->is_pro_fe ? 'CHECKED' : '' }}> Talks
                                </label>
                                <div class="help">
                                    Sourced from <a href="https://flutterevents.com" target="_blank">https://flutterevents.com</a>
                                </div>
							</div>

						</div>
					</div>

				</div>

			</article>

			<p>&nbsp;</p>
			<p>&nbsp;</p>

			<div class="subtitle">Optional Fields</div>

			<article class="message is-dark is-elevated">
				<div class="message-body">

                    <div class="field">
						<label class="label" for="avatar">
							Avatar Image
						</label>
						<div class="control">

							{{ Form::file('avatar') }}

							@if ($errors->has('avatar'))
								<span class="help is-danger">
									{{ $errors->first('avatar') }}
								</span>
							@endif
						</div>
					</div>

					<div class="field">
						<label class="label" for="bio">
							Bio
						</label>
						<div class="control">

							{{ Form::textarea('bio', $user->bio, ['class' => 'textarea', 'rows' => 3]) }}

							@if ($errors->has('bio'))
								<span class="help is-danger">
									{{ $errors->first('bio') }}
								</span>
							@endif
						</div>
					</div>

					<div class="field">
						<label class="label" for="website_url">
							Website
						</label>
						<div class="control has-icons-left">

							{{ Form::url('website_url', $user->website_url, ['class' => 'input', 'placeholder' => 'https://example.com']) }}

							<span class="icon is-small is-left">
								<i class="fas fa-globe"></i>
							</span>

							@if ($errors->has('website_url'))
								<span class="help is-danger">
									{{ $errors->first('website_url') }}
								</span>
							@endif
						</div>
					</div>



					<div class="field">
						<label class="label" for="github_url">
							6itHub
						</label>
						<div class="control has-icons-left">

							{{ Form::url('github_url', $user->github_url, ['class' => 'input', 'placeholder' => 'https://github.com']) }}

							<span class="icon is-small is-left">
								<i class="fab fa-github"></i>
							</span>

							@if ($errors->has('github_url'))
								<span class="help is-danger">
									{{ $errors->first('github_url') }}
								</span>
							@endif
						</div>
					</div>


					<div class="field">
						<label class="label" for="medium_url">
							Medium
						</label>
						<div class="control has-icons-left">

							{{ Form::url('medium_url', $user->medium_url, ['class' => 'input', 'placeholder' => 'https://medium.com']) }}

							<span class="icon is-small is-left">
								<i class="fab fa-medium"></i>
							</span>

							@if ($errors->has('medium_url'))
								<span class="help is-danger">
									{{ $errors->first('medium_url') }}
								</span>
							@endif
						</div>
					</div>


					<div class="field">
						<label class="label" for="twitter_url">
							Twitter
						</label>
						<div class="control has-icons-left">

							{{ Form::url('twitter_url', $user->twitter_url, ['class' => 'input', 'placeholder' => 'https://twitter.com']) }}

							<span class="icon is-small is-left">
								<i class="fab fa-twitter"></i>
							</span>

							@if ($errors->has('twitter_url'))
								<span class="help is-danger">
									{{ $errors->first('twitter_url') }}
								</span>
							@endif
						</div>
					</div>


					<div class="field">
						<label class="label" for="youtube_url">
							YouTube
						</label>
						<div class="control has-icons-left">

							{{ Form::url('youtube_url', $user->youtube_url, ['class' => 'input', 'placeholder' => 'https://youtube.com']) }}

							<span class="icon is-small is-left">
								<i class="fab fa-youtube"></i>
							</span>

							@if ($errors->has('youtube_url'))
								<span class="help is-danger">
									{{ $errors->first('youtube_url') }}
								</span>
							@endif
						</div>
					</div>


					<div class="field">
						<label class="label" for="linkedin_url">
							LinkedIn
						</label>
						<div class="control has-icons-left">

							{{ Form::url('linkedin_url', $user->linkedin_url, ['class' => 'input', 'placeholder' => 'https://linkedin.com']) }}

							<span class="icon is-small is-left">
								<i class="fab fa-linkedin"></i>
							</span>

							@if ($errors->has('linkedin_url'))
								<span class="help is-danger">
									{{ $errors->first('linkedin_url') }}
								</span>
							@endif
						</div>
					</div>


				</div>
			</article>

			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>

			<div class="columns is-centered is-mobile">

				<div class="control">
					<a href="{{ fpUrl() }}" class="button is-medium is-outlined is-slightly-elevated">
						<i style="font-size: 20px" class="fa fa-times-circle"></i> &nbsp; Cancel
					</a> &nbsp;
					<button id="saveButton" class="button is-info is-medium is-slightly-elevated">
						<i style="font-size: 20px" class="fas fa-cloud-upload-alt"></i> &nbsp; Save
					</button>
				</div>
			</div>

			<p>&nbsp;</p>

			{{ Form::close() }}

		</div>
	</div>
@stop