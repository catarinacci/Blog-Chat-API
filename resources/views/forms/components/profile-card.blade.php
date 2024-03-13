{{-- <x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    
> --}}

{{-- @foreach($getItems() as $term => $description)

<img class="" src={{ $description}} alt="">

@endforeach --}}
    <div class="flex justify-center justify-center"  x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }">
        <div class="">
            <div class="flex justify-center justify-center">
              <img class="w-32"src={{ $getItems()['profile_photo_path'] }} alt="profile-picture" />
            </div>
            <div class="p-6 text-center">
              <h4 class="block mb-2 font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-100">
                Natalie Paisley
              </h4>
              <p
                class="block font-sans text-base antialiased font-medium leading-relaxed text-transparent bg-clip-text bg-gradient-to-tr from-blue-gray-600 to-blue-gray-400">
                CEO / Co-Founder
              </p>
            </div>
            <div class="flex justify-center p-6 pt-2 gap-7">
              <a href="#facebook"
                class="block font-sans text-xl antialiased font-normal leading-relaxed text-transparent bg-clip-text bg-gradient-to-tr from-blue-600 to-blue-400">
                <i class="fab fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="#twitter"
                class="block font-sans text-xl antialiased font-normal leading-relaxed text-transparent bg-clip-text bg-gradient-to-tr from-light-blue-600 to-light-blue-400">
                <i
                  class="fab fa-twitter" aria-hidden="true">
                </i>
              </a>
              <a href="#instagram"
                class="block font-sans text-xl antialiased font-normal leading-relaxed text-transparent bg-clip-text bg-gradient-to-tr from-purple-600 to-purple-400"><i
                  class="fab fa-instagram" aria-hidden="true">
                </i>
              </a>
            </div>
        </div>
    </div>
{{-- </x-dynamic-component> --}}
