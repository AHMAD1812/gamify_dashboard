<template>
    <span>
        <div>
            <div class="tab-from-content">
                <div class="title-icon">
                    <h3 class="title">
                        <i class="uil uil-notebooks"></i>Curriculum
                    </h3>
                </div>
                <div class="curriculum-section">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="curriculum-add-item">
                                <h4 class="section-title mt-0">
                                    <i class="fas fa-th-list mr-2"></i
                                    >Curriculum
                                </h4>
                            </div>
                            <div class="added-section-item mb-30">
                                <div class="section-group-list">
                                    <div
                                        class="section-list-item"
                                        v-for="(item, key) in curriculum"
                                        :key="`curriculum_${key}_`"
                                    >
                                        <div class="section-item-title">
                                            <i
                                                class="fas mr-2"
                                                :class="[
                                                    item.type == 'assignment'
                                                        ? 'fa-file'
                                                        : item.type == 'quiz'
                                                        ? 'fa-stream'
                                                        : 'fa-clipboard-list',
                                                ]"
                                            ></i>
                                            <span
                                                class="section-item-title-text"
                                                >{{ item.name }}</span
                                            >
                                        </div>
                                        <button
                                            type="button"
                                            class="section-item-tools"
                                            data-toggle="modal"
                                            :data-target="[
                                                item.type == 'quiz'
                                                    ? '#add_quiz_model'
                                                    : item.type == 'assignment'
                                                    ? '#add_assignment_model'
                                                    : '#add_lecture_model',
                                            ]"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="section-item-tools"
                                            @click="deleteCurriculum(key)"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="section-add-item-wrap p-3">
                                    <button
                                        class="add_lecture"
                                        data-toggle="modal"
                                        data-target="#add_lecture_model"
                                    >
                                        <i class="far fa-plus-square mr-2"></i
                                        >Lecture
                                    </button>
                                    <button
                                        class="add_quiz"
                                        data-toggle="modal"
                                        data-target="#add_quiz_model"
                                    >
                                        <i class="far fa-plus-square mr-2"></i
                                        >Quiz
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="modal fade"
            id="add_lecture_model"
            tabindex="-1"
            aria-labelledby="lectureModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lectureModalLabel">
                            Add Lecture
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="new-section-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="course-main-tabs">
                                        <div
                                            class="nav nav-pills flex-column flex-sm-row nav-tabs"
                                            role="tablist"
                                        >
                                            <a
                                                class="flex-sm-fill text-sm-center nav-link active"
                                                data-toggle="tab"
                                                href="#nav-basic"
                                                role="tab"
                                                aria-selected="true"
                                                ><i
                                                    class="fas fa-file-alt mr-2"
                                                ></i
                                                >Basic</a
                                            >

                                            <a
                                                class="flex-sm-fill text-sm-center nav-link"
                                                data-toggle="tab"
                                                href="#nav-attachment"
                                                role="tab"
                                                aria-selected="false"
                                                ><i
                                                    class="fas fa-paperclip mr-2"
                                                ></i
                                                >Attachments</a
                                            >
                                        </div>
                                        <div class="tab-content">
                                            <div
                                                class="tab-pane fade show active"
                                                id="nav-basic"
                                                role="tabpanel"
                                            >
                                                <div class="new-section mt-30">
                                                    <div class="form_group">
                                                        <label class="label25"
                                                            >Lecture
                                                            Title*</label
                                                        >
                                                        <input
                                                            class="form_input_1"
                                                            type="text"
                                                            v-model="lecture_title"
                                                            placeholder="Title here"
                                                        />
                                                    </div>
                                                </div>
                                                <div
                                                    class="ui search focus lbel25 mt-30"
                                                >
                                                    <label>Description*</label>
                                                    <div class="ui form swdh30">
                                                        <div class="field">
                                                            <textarea
                                                                rows="3"
                                                                name="description"
                                                                v-model="lecture_description"
                                                                placeholder="Description here..."
                                                            ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="preview-dt">
                                                    <span class="title-875"
                                                        >Free Preview</span
                                                    >
                                                    <label class="switch">
                                                        <input
                                                            type="checkbox"
                                                            name="preview_op"
                                                            value=""
                                                        />
                                                        <span></span>
                                                    </label>
                                                </div> -->
                                            </div>
                                            <div
                                                class="tab-pane fade"
                                                id="nav-attachment"
                                                role="tabpanel"
                                            >
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div
                                                            class="upload-file-dt mt-30"
                                                        >
                                                            <div
                                                                class="upload-btn"
                                                            >
                                                                <input
                                                                    class="uploadBtn-main-input"
                                                                    type="file"
                                                                    @change="addlectureFile"
                                                                    id="SourceFile__input--source"
                                                                />
                                                                <label
                                                                    for="SourceFile__input--source"
                                                                    title="Zip"
                                                                    ><i
                                                                        class="far fa-plus-square mr-2"
                                                                    ></i
                                                                    >Attachment</label
                                                                >
                                                            </div>
                                                            <span
                                                                class="uploadBtn-main-file"
                                                                >Supports: jpg,
                                                                jpeg, png, pdf
                                                                or .zip</span
                                                            >
                                                            <div
                                                                class="add-attachments-dt"
                                                            >
                                                                <div
                                                                    class="attachment-items"
                                                                    v-if="lecture_file != null"
                                                                >
                                                                    <div
                                                                        class="attachment_id"
                                                                    >
                                                                        File Attached
                                                                    </div>
                                                                    <button
                                                                        class="cancel-btn"
                                                                        type="button"
                                                                        @click="lecture_file = null"
                                                                    >
                                                                        <i
                                                                            class="fas fa-trash-alt"
                                                                        ></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="main-btn cancel close-btn"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="button"
                            class="main-btn"
                            @click="addCurriculum('lecture', 'Lecture')"
                        >
                            Add Lecture
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="modal fade"
            id="add_quiz_model"
            tabindex="-1"
            aria-labelledby="lectureModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lectureModalLabel">
                            Add Quiz
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="new-section-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="course-main-tabs">
                                        <div
                                            class="nav nav-pills flex-column flex-sm-row nav-tabs"
                                            role="tablist"
                                        >
                                            <a
                                                class="flex-sm-fill text-sm-center nav-link active"
                                                data-toggle="tab"
                                                href="#nav-questions"
                                                role="tab"
                                                aria-selected="false"
                                                ><i
                                                    class="fas fa-question-circle mr-2"
                                                ></i
                                                >Questions</a
                                            >
                                            <!-- <a
                                                class="flex-sm-fill text-sm-center nav-link"
                                                data-toggle="tab"
                                                href="#nav-setting"
                                                role="tab"
                                                aria-selected="false"
                                                ><i class="fas fa-cog mr-2"></i
                                                >Setting</a
                                            > -->
                                        </div>
                                        <div class="tab-content">
                                            <div
                                                class="tab-pane fade active show"
                                                id="nav-questions"
                                                role="tabpanel"
                                            >
                                                <div
                                                    class="lecture-video-dt mt-30"
                                                >
                                                    <div class="add-ques-dt">
                                                        <button
                                                            type="button"
                                                            class="main-btn color btn-hover w-100"
                                                            data-toggle="collapse"
                                                            data-target="#add-ques"
                                                        >
                                                            <i
                                                                class="far fa-plus-square mr-2"
                                                            ></i
                                                            >Add Question
                                                        </button>
                                                        <div
                                                            id="add-ques"
                                                            class="collapse"
                                                        >
                                                            <div
                                                                class="lecture-video-dt mt-30"
                                                            >
                                                                <span
                                                                    class="video-info"
                                                                    >Question
                                                                    Type</span
                                                                >
                                                                <div
                                                                    class="video-category"
                                                                >
                                                                    <label
                                                                        ><input
                                                                            type="radio"
                                                                            name="colorRadio"
                                                                            :value="
                                                                                1
                                                                            "
                                                                            v-model="
                                                                                question_type
                                                                            "
                                                                            class="d-none"
                                                                        /><span
                                                                            :class="[
                                                                                question_type ==
                                                                                1
                                                                                    ? 'selected'
                                                                                    : '',
                                                                            ]"
                                                                            ><i
                                                                                class="far fa-check-circle mr-2"
                                                                            ></i
                                                                            >Multiple
                                                                            Choice</span
                                                                        ></label
                                                                    >
                                                                    <!-- <label
                                                                        ><input
                                                                            type="radio"
                                                                            name="colorRadio"
                                                                            :value="
                                                                                2
                                                                            "
                                                                            v-model="
                                                                                question_type
                                                                            "
                                                                            class="d-none"
                                                                        /><span
                                                                            :class="[
                                                                                question_type ==
                                                                                2
                                                                                    ? 'selected'
                                                                                    : '',
                                                                            ]"
                                                                            ><i
                                                                                class="far fa-file-alt mr-2"
                                                                            ></i
                                                                            >Milti
                                                                            Line
                                                                            Text</span
                                                                        ></label
                                                                    > -->
                                                                    <div
                                                                        class="mchoice"
                                                                        v-if="
                                                                            question_type ==
                                                                            1
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="ques-box"
                                                                        >
                                                                            <div
                                                                                class="row"
                                                                            >
                                                                                <div
                                                                                    class="col-lg-5 col-md-12"
                                                                                >
                                                                                    <div
                                                                                        class="form_group mt-30"
                                                                                    >
                                                                                        <label
                                                                                            class="label25 text-left"
                                                                                            >Question
                                                                                            Title*</label
                                                                                        >
                                                                                        <input
                                                                                            class="form_input_1"
                                                                                            type="text"
                                                                                            placeholder="Write question title"
                                                                                            v-model="
                                                                                                question_name
                                                                                            "
                                                                                        />
                                                                                    </div>
                                                                                </div>

                                                                                <div
                                                                                    class="col-lg-3 col-md-6"
                                                                                >
                                                                                    <div
                                                                                        class="form_group mt-30"
                                                                                    >
                                                                                        <label
                                                                                            class="label25 text-left"
                                                                                            >Time</label
                                                                                        >
                                                                                        <div
                                                                                            class="d-flex align-items-baseline"
                                                                                        >
                                                                                            <vue-timepicker
                                                                                                manual-input
                                                                                                hide-dropdown
                                                                                                :format="
                                                                                                    showHour
                                                                                                        ? 'hh:mm:ss'
                                                                                                        : 'mm:ss'
                                                                                                "
                                                                                                v-model="
                                                                                                    question_time
                                                                                                "
                                                                                            >
                                                                                            </vue-timepicker>
                                                                                            <input
                                                                                                type="checkbox"
                                                                                                v-model="
                                                                                                    showHour
                                                                                                "
                                                                                                class="ml-2"
                                                                                            />
                                                                                            <label
                                                                                                class="label25 text-left"
                                                                                                >Hour</label
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-1 col-md-1"
                                                                                >
                                                                                    <div
                                                                                        class="form_group mt-30"
                                                                                    ></div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-3 col-md-6"
                                                                                >
                                                                                    <div
                                                                                        class="form_group mt-30"
                                                                                    >
                                                                                        <label
                                                                                            class="label25 text-left"
                                                                                            >Score*</label
                                                                                        >
                                                                                        <input
                                                                                            class="form_input_1"
                                                                                            type="number"
                                                                                            placeholder="Score"
                                                                                            v-model="
                                                                                                question_score
                                                                                            "
                                                                                        />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="ans-box"
                                                                        >
                                                                            <div
                                                                                class="row"
                                                                            >
                                                                                <div
                                                                                    class="col-lg-12 col-md-12"
                                                                                >
                                                                                    <button
                                                                                        class="main-btn color btn-hover mt-30"
                                                                                        @click="
                                                                                            addOption()
                                                                                        "
                                                                                    >
                                                                                        Add
                                                                                        Option
                                                                                    </button>
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-12 col-md-12"
                                                                                >
                                                                                    <div
                                                                                        class="option-item"
                                                                                        :key="`option_${index}`"
                                                                                        v-for="(
                                                                                            option,
                                                                                            index
                                                                                        ) in question_option"
                                                                                    >
                                                                                        <div
                                                                                            class="opt-title"
                                                                                        >
                                                                                            <h4>
                                                                                                {{
                                                                                                    index +
                                                                                                    1
                                                                                                }}.
                                                                                                Option
                                                                                            </h4>
                                                                                            <span
                                                                                                class="opt-del"
                                                                                                @click="
                                                                                                    deleteOption(
                                                                                                        index
                                                                                                    )
                                                                                                "
                                                                                                ><i
                                                                                                    class="fas fa-trash-alt"
                                                                                                ></i
                                                                                            ></span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="option-wrap"
                                                                                        >
                                                                                            <div
                                                                                                class="form_group"
                                                                                            >
                                                                                                <label
                                                                                                    class="label25 text-left"
                                                                                                    >Option
                                                                                                    Title*</label
                                                                                                >
                                                                                                <input
                                                                                                    class="form_input_1"
                                                                                                    type="text"
                                                                                                    placeholder="Option title"
                                                                                                    v-model="
                                                                                                        option.name
                                                                                                    "
                                                                                                />
                                                                                            </div>
                                                                                            <div
                                                                                                class="agree_checkbox"
                                                                                            >
                                                                                                <input
                                                                                                    type="checkbox"
                                                                                                    :value="
                                                                                                        true
                                                                                                    "
                                                                                                    :id="`check_${index}`"
                                                                                                    v-model="
                                                                                                        option.isCorrect
                                                                                                    "
                                                                                                    name="correct_answer"
                                                                                                />
                                                                                                <label
                                                                                                    :for="`check_${index}`"
                                                                                                    >Correct
                                                                                                    answer</label
                                                                                                >
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="sline"
                                                                        v-if="
                                                                            question_type ==
                                                                            2
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="ques-box"
                                                                        >
                                                                            <div
                                                                                class="row"
                                                                            >
                                                                                <div
                                                                                    class="col-lg-2 col-md-2"
                                                                                >
                                                                                    <div
                                                                                        class="form_group mt-30"
                                                                                    >
                                                                                        <label
                                                                                            class="label25 text-left"
                                                                                            >Image*</label
                                                                                        >
                                                                                        <div
                                                                                            class="upload-thumb"
                                                                                        >
                                                                                            <input
                                                                                                class="uploadBtn-input-preview"
                                                                                                type="file"
                                                                                                accept="image/png"
                                                                                                id="thumbnail_source2"
                                                                                            />
                                                                                            <label
                                                                                                class="mx-0 my-0"
                                                                                                for="thumbnail_source2"
                                                                                                title="Image"
                                                                                                ><img
                                                                                                    class="img-thumbnail"
                                                                                                    :src="`${globalAssetUrl}images/placeholder-image.png`"
                                                                                                    alt=""
                                                                                            /></label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-7 col-md-9"
                                                                                >
                                                                                    <div
                                                                                        class="form_group mt-30"
                                                                                    >
                                                                                        <label
                                                                                            class="label25 text-left"
                                                                                            >Question
                                                                                            Title*</label
                                                                                        >
                                                                                        <input
                                                                                            class="form_input_1"
                                                                                            type="text"
                                                                                            placeholder="Write question title"
                                                                                        />
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-3 col-md-12"
                                                                                >
                                                                                    <div
                                                                                        class="form_group mt-30"
                                                                                    >
                                                                                        <label
                                                                                            class="label25 text-left"
                                                                                            >Score*</label
                                                                                        >
                                                                                        <input
                                                                                            class="form_input_1"
                                                                                            type="number"
                                                                                            placeholder="Score"
                                                                                        />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="share-submit-btns pl-0 pb-0"
                                                            >
                                                                <button
                                                                    class="main-btn color btn-hover"
                                                                    type="button"
                                                                    @click="
                                                                        addQuestion()
                                                                    "
                                                                >
                                                                    <i
                                                                        class="fas fa-save mr-2"
                                                                    ></i>
                                                                    {{
                                                                        isEdit
                                                                            ? "Edit Question"
                                                                            : "Save Question"
                                                                    }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="added-ques">
                                                            <div
                                                                class="section-group-list pl-0 pr-0"
                                                            >
                                                                <div
                                                                    class="section-list-item"
                                                                    v-for="(
                                                                        question,
                                                                        key
                                                                    ) in questions"
                                                                    :key="`question_${key}`"
                                                                >
                                                                    <div
                                                                        class="section-item-title"
                                                                    >
                                                                        <i
                                                                            class="far fa-dot-circle mr-2"
                                                                        ></i>
                                                                        <span
                                                                            class="section-item-title-text"
                                                                            >{{
                                                                                question.name
                                                                            }}</span
                                                                        >
                                                                    </div>
                                                                    <button
                                                                        type="button"
                                                                        class="section-item-tools"
                                                                    >
                                                                        <i
                                                                            class="fas fa-edit"
                                                                            @click="
                                                                                editQuestion(
                                                                                    key
                                                                                )
                                                                            "
                                                                        ></i>
                                                                    </button>
                                                                    <button
                                                                        type="button"
                                                                        class="section-item-tools"
                                                                    >
                                                                        <i
                                                                            class="fas fa-trash-alt"
                                                                            @click="
                                                                                deleteQuestion(
                                                                                    key
                                                                                )
                                                                            "
                                                                        ></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="tab-pane fade"
                                                id="nav-setting"
                                                role="tabpanel"
                                            >
                                                <div class="new-section mt-30">
                                                    <div class="quiz-cogs-step">
                                                        <label
                                                            class="label25 quiz-st-ft text-left"
                                                            >Gradable</label
                                                        >
                                                        <div
                                                            class="cogs-toggle"
                                                        >
                                                            <label
                                                                class="switch"
                                                            >
                                                                <input
                                                                    type="checkbox"
                                                                    id="gradable_quiz"
                                                                    value=""
                                                                />
                                                                <span></span>
                                                            </label>
                                                            <label
                                                                for="gradable_quiz"
                                                                class="lbl-quiz"
                                                                >Quiz
                                                                Gradable</label
                                                            >
                                                        </div>
                                                        <p>
                                                            If this quiz test
                                                            affect on the
                                                            students grading
                                                            system for this
                                                            course.
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="quiz-cogs-step mt-30"
                                                    >
                                                        <label
                                                            class="label25 quiz-st-ft text-left"
                                                            >Remaining time
                                                            display</label
                                                        >
                                                        <div
                                                            class="cogs-toggle"
                                                        >
                                                            <label
                                                                class="switch"
                                                            >
                                                                <input
                                                                    type="checkbox"
                                                                    id="show_time"
                                                                    value=""
                                                                />
                                                                <span></span>
                                                            </label>
                                                            <label
                                                                for="show_time"
                                                                class="lbl-quiz"
                                                                >Show
                                                                Time</label
                                                            >
                                                        </div>
                                                        <p>
                                                            By enabling this
                                                            option, quiz taker
                                                            will show remaining
                                                            time during attempt.
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div
                                                                class="form_group mt-30"
                                                            >
                                                                <label
                                                                    class="label25"
                                                                    >Time
                                                                    Limit*</label
                                                                >
                                                                <div
                                                                    class="input-group"
                                                                >
                                                                    <input
                                                                        class="form_input_1 white-bg"
                                                                        type="number"
                                                                        placeholder=""
                                                                    />
                                                                    <div
                                                                        class="input-group-append"
                                                                    >
                                                                        <span
                                                                            class="input-group-text int4856"
                                                                            >Minutes</span
                                                                        >
                                                                    </div>
                                                                    <span
                                                                        class="alt-text"
                                                                        >Set
                                                                        zero to
                                                                        disable
                                                                        time
                                                                        limit.</span
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div
                                                                class="form_group mt-30"
                                                            >
                                                                <label
                                                                    class="label25"
                                                                    >Passing
                                                                    Score(%)*</label
                                                                >
                                                                <input
                                                                    class="form_input_1"
                                                                    type="number"
                                                                    placeholder=""
                                                                />
                                                                <span
                                                                    class="alt-text"
                                                                    >Student
                                                                    have to
                                                                    collect this
                                                                    score in
                                                                    percent for
                                                                    the pass
                                                                    this
                                                                    quiz.</span
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div
                                                                class="form_group mt-30"
                                                            >
                                                                <label
                                                                    class="label25"
                                                                    >Questions
                                                                    Limit*</label
                                                                >
                                                                <input
                                                                    class="form_input_1"
                                                                    type="number"
                                                                    placeholder=""
                                                                />
                                                                <span
                                                                    class="alt-text"
                                                                    >The number
                                                                    of questions
                                                                    student have
                                                                    to answer in
                                                                    this
                                                                    quiz.</span
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="main-btn cancel close-btn"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="button"
                            class="main-btn"
                            @click="addCurriculum('quiz', 'Quiz')"
                        >
                            Add Quiz
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
export default {
    name: "Curriculum",
    data() {
        return {
            question_type: 1,
            question_option: [],
            question_name: "",
            question_time: {
                mm: "",
                ss: "",
            },
            question_score: "",
            questions: [],
            showHour: false,
            isEdit: false,
            edit_key: -1,
            curriculum: [],
            lecture_title:"",
            lecture_description:"",
            lecture_file:null,
        };
    },
    methods:{
        addRequestCurriculum(){
            if(this.curriculum.length == 0){
                this.errorToast("Atleast 1 curriculum is required");
                return;
            }
            let request = {
                questions : this.questions,
                curriculum : this.curriculum,
                lecture_title: this.lecture_title,
                lecture_description: this.lecture_description,
                lecture_file: this.lecture_file
            }
            this.$emit('add-curriculum',request);
        },
        addCurriculum(type,name){
            let item_type = this.curriculum.map((item)=>{
                return item.type;
            });
            if(!item_type.includes(type)){
                if(type == 'quiz' && this.questions.length == 0){
                    event.preventDefault();
                    this.errorToast('Questions are required');
                    return;
                }else if(type == 'lecture'){
                    if(this.lecture_title == ""){
                        this.errorToast("Title is required");
                        return;
                    }else if(this.lecture_description == ""){
                        this.errorToast("Description required");
                        return;
                    }
                }
                this.curriculum.push({
                    type:type,
                    name:name
                });

                $('.close-btn').click();                
            }
        },
        deleteCurriculum(key){
            this.curriculum.splice(key,1);
        },
        addOption() {
            this.question_option.push({ name: "", isCorrect: false });
        },
        deleteOption(index) {
            this.question_option.splice(index, 1);
        },
        addQuestion() {
            if (this.question_name == "") {
                this.errorToast("Name required");
                return;
            } else if( this.question_time.mm == "" || this.question_time.ss == ""){
                this.errorToast("Time required");
                return;
            } else if(this.question_score == ""){
                this.errorToast("Score required");
                return;
            } else if (this.question_option.length == 0) {
                this.errorToast("Options are required");
                return;
            } else if (this.question_option.length < 2 || this.question_option.length > 4) {
                this.errorToast("There should be at least 2 options or max 4 options");
                return;
            }
            let option = this.question_option.filter((opt)=>{
                return opt.name == "";
            });
            if(option.length > 0){
                this.errorToast("Option name required");
                return;
            }
            option = this.question_option.filter((opt)=>{
                return opt.isCorrect == true;
            });
            if(option.length == 0){
                this.errorToast("Select Correct Option");
                return;
            }
            if (this.isEdit) {
                let key = this.edit_key;
                this.questions[key].options = this.question_option;
                this.questions[key].name = this.question_name;
                this.questions[key].score = this.question_score;
                this.questions[key].time = this.question_time;
                this.questions[key].is_hour = this.showHour;
                this.isEdit = false;
                this.edit_key = -1;
            } else {
                this.questions.push({
                    name: this.question_name,
                    options: this.question_option,
                    time: this.question_time,
                    score: this.question_score,
                    is_hour: this.showHour,
                });
            }
            this.question_time = {
                mm: "",
                ss: "",
            };
            this.showHour = false;
            this.question_score = "";
            this.question_name = "";
            this.question_type = 1;
            this.question_option = [];
        },
        editQuestion(key) {
            this.question_option = this.questions[key].options;
            this.question_name = this.questions[key].name;
            this.question_score = this.questions[key].score;
            this.question_time = this.questions[key].time;
            this.showHour = this.questions[key].is_hour;
            this.isEdit = true;
            this.edit_key = key;
        },
        deleteQuestion(key) {
            this.questions.splice(key, 1);
        },
        errorToast(message){
            Vue.$toast.open({
                message: message,
                type: "error",
                position: "top-right",
            });
        },
        addlectureFile(event){
            this.lecture_file = event.target.files[0];
        },
    },
    watch: {
        showHour() {
            if (this.showHour) {
                this.question_time = {
                    hh: "",
                    mm: "",
                    ss: "",
                };
            } else {
                this.question_time = {
                    mm: "",
                    ss: "",
                };
            }
        },
    },
};
</script>

<style></style>
