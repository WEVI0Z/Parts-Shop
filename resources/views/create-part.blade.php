@extends("layout")

@section("content")
    <form action="{{route("create-part")}}" method="post" class="form create" enctype="multipart/form-data">
        @csrf

        <label for="name" class="form__label">
            Part name:
            <input type="text" name="name" id="name" class="form__input" value="{{old("name")}}">
        </label>

        <label for="category" class="form__label">
            Part category:
            <input type="text" name="category" id="category" class="form__input" value="{{old("category")}}">
        </label>

        <label for="description" class="form__label">
            Part description:
            <textarea name="description" id="description" cols="30" rows="10" class="form__textarea" value="{{old("description")}}"></textarea>
        </label>

        <label for="price" class="form__label">
            Part price:
            <input type="number" name="price" id="price" class="form__input" value="{{old("price")}}">
        </label>

        <label for="image" class="form__label">
            Part image:
            <input type="file" name="image" id="image" class="form__file">
        </label>

        <div class="parameters">
            <h3>Part parameters:</h3>
            <ul class="parameters__list">
                <li class="parameters__item parameter">
                    <label class="parameter__label">
                        Spec name:
                        <input type="text" name="parameters_title[0]" id="" class="parameter__title">
                    </label>
                    <label class="parameter__label">
                        Spec info:
                        <input type="text" name="parameters_info[0]" id="" class="parameter__info">
                    </label>
                </li>
            </ul>

            <button type="button" class="parameters__button">
                Add parameter
            </button>
        </div>

        <button type="submit" class="form__submit">Create part</button>
    </form>

    <script>
        const parameters = document.querySelector(".parameters");
        const parametersList = parameters.querySelector(".parameters__list");
        const parametersButton = parameters.querySelector(".parameters__button");

        let counter = 0;

        parametersButton.addEventListener("click", (event) => {
           let parametersTitles = parameters.querySelectorAll(".parameter__title");
           let parametersInfos = parameters.querySelectorAll(".parameter__info");
           event.preventDefault();
           counter++;

           parametersList.innerHTML += `
                <li class="parameters__item parameter">
                    <label class="parameter__label">
                        Spec name:
                        <input type="text" name="parameters_title[${counter}]" class="parameter__title">
                    </label>
                    <label class="parameter__label">
                        Spec info:
                        <input type="text" name="parameters_info[${counter}]" class="parameter__info">
                    </label>
                </li>
           `;

           const newParametersTitles = document.querySelectorAll(".parameter__title");
           const newParametersInfos = document.querySelectorAll(".parameter__info");

           newParametersTitles.forEach((title, index) => {
               if(index < parametersTitles.length) {
                   title.value = parametersTitles[index].value;
               }
           });

           newParametersInfos.forEach((info, index) => {
               if(index < parametersInfos.length) {
                   info.value = parametersInfos[index].value;
               }
           });

           parametersInfos = newParametersInfos;
            parametersTitles = newParametersTitles;
        });
    </script>
@endsection
