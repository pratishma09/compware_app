<p class="text-2xl ml-20 text-center font-medium mt-10 mb-5 ">Frequently Asked Questions</p>
<div class="h-[35em] bg-cover bg-center" style="background-image: url('{{ asset('static/events/faq-bg.png') }}');">
    <div class="h-full bg-black bg-opacity-70">
        <div class="mb-4 pt-28">
            <div id="question1"
                class="flex h-full items-center justify-between px-4 rounded-md cursor-pointer bg-gray-100 mx-40"
                onclick="toggleAnswer('answer1')">

                <span class="font-medium text-sm">What is the event focusing on?</span>
                <span class="text-3xl">.</span>
            </div>
            <div id="answer1"
                class="answer flex justify-between items-center rounded-b-md cursor-pointer px-8 bg-gray-100 text-gray-500 text-[0.7rem] mx-40 overflow-hidden transition-max-height duration-500 ease-in-out max-h-0">
                The event is focusing on the objective of making Nepal a thriving IT hub by the year 2030. The primary
                focus
                is likely on discussing strategies, policies, investments, and collaborations required to expand the
                country’s IT sector.
            </div>
        </div>
        <div class="mb-4">
            <div id="question2"
                class="flex h-full items-center justify-between px-4 rounded-md cursor-pointer bg-gray-100 mx-40"
                onclick="toggleAnswer('answer2')">

                <span class="font-medium text-sm">Who can join this discussion?</span>
                <span class="text-3xl">.</span>
            </div>
            <div id="answer2"
                class="answer flex justify-between items-center rounded-b-md cursor-pointer px-8 bg-gray-100 text-gray-500 text-[0.7rem] mx-40 overflow-hidden transition-max-height duration-500 ease-in-out max-h-0">
                Upon submission of the form, invitations will be sent via email to those who qualify. Those who receive
                an invitation will have the honour of participating in the discussion.
            </div>
        </div>
        <div class="mb-4">
            <div id="question3"
                class="flex h-full items-center justify-between px-4 rounded-md cursor-pointer bg-gray-100 mx-40"
                onclick="toggleAnswer('answer3')">

                <span class="font-medium text-sm">Who will be attending?</span>
                <span class="text-3xl">.</span>
            </div>
            <div id="answer3"
                class="answer flex justify-between items-center rounded-b-md cursor-pointer px-8 bg-gray-100 text-gray-500 text-[0.7rem] mx-40 overflow-hidden transition-max-height duration-500 ease-in-out max-h-0">
                Representatives from educational institutions, industry leaders in the IT sector, investors, and
                professionals from various fields will be present in the event.
            </div>
        </div>
        <div class="mb-4">
            <div id="question4"
                class="flex h-full items-center justify-between px-4 rounded-md cursor-pointer bg-gray-100 mx-40"
                onclick="toggleAnswer('answer4')">

                <span class="font-medium text-sm">Why is this event being organized?</span>
                <span class="text-3xl">.</span>
            </div>
            <div id="answer4"
                class="answer flex justify-between items-center rounded-b-md cursor-pointer px-8 bg-gray-100 text-gray-500 text-[0.7rem] mx-40 overflow-hidden transition-max-height duration-500 ease-in-out max-h-0">
                The event is being organized in order to foster the development of Nepal’s IT sector and bring together
                industry leaders for strategic planning.
            </div>
        </div>
        <div class="mb-4">
            <div id="question5"
                class="flex h-full items-center justify-between px-4 rounded-md cursor-pointer bg-gray-100 mx-40"
                onclick="toggleAnswer('answer5')">

                <span class="font-medium text-sm">What do we hope to achieve from this event?</span>
                <span class="text-3xl">.</span>
            </div>
            <div id="answer5"
                class="answer flex justify-between items-center rounded-b-md cursor-pointer px-8 bg-gray-100 text-gray-500 text-[0.7rem] mx-40 overflow-hidden transition-max-height duration-500 ease-in-out max-h-0">
                Our goal is to gather valuable insights and implementable strategies that will help Nepal become a
                vibrant IT hub by 2030.
            </div>
        </div>
    </div>
</div>
<style>
    .answer {
        display: none;
    }

    .answer.show {
        display: block;
    }
</style>
