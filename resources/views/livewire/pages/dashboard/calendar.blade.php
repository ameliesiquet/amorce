<section class="calendar">
    <div class="flex items-center justify-center py-8 px-4">
        <div class="max-w-sm w-full shadow-lg">
            <div class="md:p-8 p-5  bg-white rounded-3xl border border-solid border-black border-opacity-10 max-w-[480px] shadow-[0px_0px_4px_rgba(0,0,0,0.25)]">
                <div class="flex flex-col gap-3">
                    <div class="px-4 flex items-center justify-between">
                        <x-icons.arrow-left/>
                        <h2 tabindex="0" class="focus:outline-none  text-xl font-bold  text-black uppercase">
                            Novembre</h2>
                        <x-icons.arrow-right/>
                    </div>
                    <hr>
                </div>
                <div class="flex items-center justify-between pt-12 overflow-x-auto text-black">
                    <table class="w-full text-black border border-gray-400 p-4">
                        <thead>
                        <tr>
                            <th>
                                <p class="text-base font-medium text-center">Mo</p>
                            </th>
                            <th>
                                <p class="text-base font-medium text-center">Tu</p>
                            </th>
                            <th>
                                <p class="text-base font-medium text-center">We</p>
                            </th>
                            <th>
                                <p class="text-base font-medium text-center">Th</p>
                            </th>
                            <th>
                                <p class="text-base font-medium text-center">Fr</p>
                            </th>
                            <th>
                                <p class="text-base font-medium text-center">Sa</p>
                            </th>
                            <th>
                                <p class="text-base font-medium text-center">Su</p>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="pt-6">
                        <tr>
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base font-medium">1</p>
                                </div>
                            </td>
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base font-medium">2</p>
                                </div>
                            </td>
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base">3</p>
                                </div>
                            </td>
                            <td class="pt-6">
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base">4</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base font-medium">5</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base font-medium">6</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base font-medium">7</p>
                                </div>
                            </td>
                            <td>
                                <div class="w-full h-full">
                                    <div
                                        class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                        <a role="link" tabindex="0"
                                           class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:bg-indigo-500 hover:bg-indigo-500 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-indigo-700 rounded-full">8</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base font-medium">9</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base">10</p>
                                </div>
                            </td>
                            <td>
                                <div class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                    <p class="text-base">11</p>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="flex flex-col gap-4">
                        <div>
                            <p>Aujourd'hui</p>
                            <x-buttons.yellow-button/>
                        </div>
                        <div>
                            <p>Demain</p>
                            <x-buttons.yellow-button/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
