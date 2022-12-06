<template>
    <Head title="Account Information" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Account Information
            </h2>
        </template>

        <div id="banner" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    View your statistics and account information
                </div>
            </div>
        </div>

        <div id="accountDiv" class="grid grid-cols-3">
            <div id="mainDiv">
                <label
                    id="namingLabel"
                    class="font-semibold text-xl text-green-300 leading-tight"
                >
                    Name:
                </label>
                <div id="dataDiv">
                    <label
                        id="dataLabel"
                        class="font-semibold text-xl text-green-300 leading-tight"
                    >
                        {{ $page.props.auth.user.name }}</label
                    >
                </div>
            </div>
            <div id="mainDiv">
                <label
                    id="namingLabel"
                    class="font-semibold text-xl text-green-300 leading-tight"
                >
                    Email:
                </label>
                <div id="dataDiv">
                    <label
                        id="dataLabel"
                        class="font-semibold text-xl text-green-300 leading-tight"
                    >
                        {{ $page.props.auth.user.email }}</label
                    >
                </div>
            </div>
            <div id="mainDiv">
                <label
                    id="namingLabel"
                    class="font-semibold text-xl text-green-300 leading-tight"
                >
                    Account Creation Date:
                </label>
                <div id="dataDiv">
                    <label
                        id="dateLabel"
                        class="font-semibold text-l text-green-300 leading-tight"
                    >
                        {{ date }}</label
                    >
                </div>
            </div>
        </div>
        <div id="helperDiv">
            <div id="statisticsDiv">
                <div id="statsLabelDiv">
                    <label
                        id="statisticLabel"
                        class="font-semibold text-xl text-black leading-tight"
                    >
                        Statistics:
                    </label>
                    <div id="borderDiv"></div>
                </div>
                <div id="statDataDiv">
                    <div class="row">
                        <div class="column">
                            <label>
                                <b> Quiz Average: </b>
                            </label>
                            <H1 id="header1">
                                <b>{{($page.props.average * 100).toFixed(2)}}%</b>
                            </H1>
                        </div>
                        <div class="column">
                            <label>
                                <b> Number of Quizzes Taken: </b>
                            </label>
                            <H1  id="header1">
                                <b>{{$page.props.numQuizzes}}</b>
                            </H1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
const props = defineProps(["auth","numQuizzes","earnedPoints","pointsPossible","average"]);

let date = new Date(Date.parse(props.auth.user.created_at));
</script>

<style scoped>


#header1{
    font-size: xx-large;
}

.column {
    float: left;
    width: 50%;
    margin-bottom: 15%;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

.row {
    display: flex;
}

.column {
    flex: 50%;
}

#banner {
    margin-top: 1em;
}

#statisticsDiv {
    background-color: white;
    border: 4px solid #22c55e;
    width: 50em;
    height: 25em;
}

#helperDiv {
    text-align: -webkit-center;
}

#statsLabelDiv {
    text-align: left;
    margin-top: 0.5em;
    margin-left: 0.5em;
}
#borderDiv {
    border-bottom: 1px solid black;
    width: 48.5em;
}

#accountDiv {
    justify-items: center;
    margin-bottom: 1em;
}

#mainDiv {
    background-color: #1c1917;
    width: 30em;
    height: 5em;
    border: 1px solid #22c55e;
    border-radius: 20px;
    margin-top: 3em;
}

#namingLabel {
    margin-left: 1em;
}

#dataDiv {
    text-align: -webkit-center;
    margin-top: center;
    padding-top: 0.5em;
}

#dataLabel {
    color: white;
}

#dateLabel {
    color: white;
}
</style>
