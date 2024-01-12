<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Talent Center 79</title>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Flip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Observer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Draggable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/MotionPathPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EaselPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/PixiPlugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>

    <!-- Register Need -->
    <link rel="stylesheet" href="{{ asset('assets/CSS/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/JS/main.js') }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fira Sans" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('node_modules\flatpickr\dist\flatpickr.css') }}"">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="{{ asset('node_modules\flatpickr\dist\flatpickr.min.js') }}"></script>

    <!-- RoughEase, ExpoScaleEase and SlowMo are all included in the EasePack file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/EasePack.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/CustomEase.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://repo.rachmat.id/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
</head>
<body>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-[85%] ml-[200px]">
        <div class="mt-40flex items-center justify-between py-4 bg-white dark:bg-gray-800">



            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="tableTalent">
                    <tr>
                        <th scope="col" class="text-gray-400 px-5 py-3 ">
                            Talent
                        </th>
                        <th scope="col" class="text-gray-400 px-7 py-3 ">
                            Level
                        </th>
                        <th scope="col" class="text-gray-400 px-6 py-3 ">
                            Pengalaman
                        </th>
                        <th scope="col" class="text-gray-400 px-6 py-3 ">
                            Status
                        </th>
                        <th scope="col" class="text-gray-400 px-6 py-3 ">
                            Kepegawaian
                        </th>
                    </tr>
                <tr class="bg-white" id="tableRow">
                <th scope="row"
                    class="flex items-center px-6 py-4">
                    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white"
                        src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="" id="talentPhoto">
                    <div class="pl-3">
                        <div class="text-base font-semibold" id="talentName"> Loading </div>
                </th>
                <td class="text-base text-gray-600 font-semibold px-6 py-4">
                    Loading
                </td>
                <td class="text-base text-gray-600 font-semibold px-6 py-4">
                    Loading
                </td>
                <td class="px-6 py-4">
                    <div
                        class="text-white font-semibold flex items-center justify-center h-7 w-20 rounded-full bg-gray-500 mr-2" id="employee_status">
                        Loading
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <div
                            class="text-white font-semibold flex items-center justify-center h-7 w-20 rounded-full bg-green-600 mr-2" id="talent_availability">
                            Loading
                        </div>
                    </div>
                </td>

            </tr>

            </table>
        </div>
    </div>
    <script>
        function fetchDataAndCreateTables() {
            fetch('http://127.0.0.1:8000/api/talent-management/talents')
                .then(response => response.json())
                .then(responseData => {
                    const data = responseData.data; // Access the 'data' property in the response

                    const tablerow = document.getElementById('tableRow');
                    tablerow.className = 'hidden';

                    if (Array.isArray(data)) {
                        data.forEach(item => {
                            const tab = document.createElement("tr");
                            tab.innerHTML = `
                                <th scope="row" class="flex items-center px-6 py-4">
                                    <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"" alt="" id="talentPhoto">
                                    <div class="pl-3">
                                        <div class="text-base font-semibold" id="talentName">${item.talentName}</div>
                                    </div>
                                </th>
                                <td class="text-base text-gray-600 font-semibold px-6 py-4">
                                    ${item.talentLevel}
                                </td>
                                <td class="text-base text-gray-600 font-semibold px-6 py-4">
                                    ${item.talentExperience}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-white font-semibold flex items-center justify-center h-7 w-20 rounded-full bg-gray-500 mr-2" id="employee_status">
                                        ${item.employeeStatus}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="text-white font-semibold flex items-center justify-center h-7 w-20 rounded-full bg-green-600 mr-2" id="talent_availability">
                                            ${item.talentAvailability}
                                        </div>
                                    </div>
                                </td>
                            `;
                            document.getElementById("tableTalent").appendChild(tab);
                        });
                    } else {
                        console.error("Data is not an array");
                    }
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });
        }

        // Call the function when the script is loaded
        fetchDataAndCreateTables();
    </script>

</body>
</html>
