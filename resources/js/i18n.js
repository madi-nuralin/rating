const datetimeFormats = {
    'en': {
        hours: {
            hour: '2-digit', minute: '2-digit', hour12: true
        },
        day: {
            month: 'short', day: 'numeric'
        },
        short: {
            year: 'numeric', month: 'short', day: 'numeric'
        },
        long: {
            year: 'numeric', month: 'short', day: 'numeric',
            hour: 'numeric', minute: 'numeric'
        }
    },
    'ru': {
        hours: {
            hour: '2-digit', minute: '2-digit', hour12: true
        },
        day: {
            month: 'short', day: 'numeric'
        },
        short: {
            year: 'numeric', month: 'short', day: 'numeric'
        },
        long: {
            year: 'numeric', month: 'short', day: 'numeric',
            hour: 'numeric', minute: 'numeric', hour12: true
        }
    }
};


let messages = {
    en: {
        pages: {
            administration: {},
            management: {
                position: {
                    head: {
                        title: 'Managing Positions'
                    },
                    header: 'Managing Positions',
                    create: {
                        title: 'New position',
                        description: 'Enter position information, including title, description, and other options.',
                        form: {
                            name: 'Name',
                            description: 'Description'
                        },
                        actions: {
                            createButton: 'Create'
                        }
                    },
                    update: {
                        title: 'Position Information',
                        description: 'Update the position information, including the name, description, and other settings.',
                        form: {
                            name: 'Name',
                            description: 'Description'
                        },
                        actions: {
                            savedMessage: 'Saved.',
                            saveButton: 'Save'
                        }
                    },
                    delete: {
                        title: 'Delete Position',
                        description: 'Permanently delete this position.',
                        content: {
                            deleteInfo: 'Once a position is deleted, all of its resources and data will be permanently deleted. Before deleting this position, please download any data or information regarding this position that you wish to retain.',
                            deleteButton: 'Delete Position',
                            modal: {
                                title: 'Delete Position',
                                content: 'Are you sure you want to delete this position? Once a position is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete Position'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'List of positions',
                        description: 'Here you can find information about positions. Click on the position name link to view detailed information and to make changes.',
                        actions: {
                            createButton: 'Add'
                        }
                    }
                },
                department: {
                    head: {
                        title: 'Managing Departments'
                    },
                    header: 'Managing Departments',
                    create: {
                        title: 'New department',
                        description: 'Enter department information, including title, description, and other options.',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            abbreviation: 'Abbreviation',
                            department_type: 'Type',
                            parent: 'Parent department',
                            positions: 'Positions'
                        },
                        actions: {
                            saveButton: 'Create'
                        }
                    },
                    update: {
                        title: 'Department Information',
                        description: 'Update the department information, including the name, description, and other settings.',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            abbreviation: 'Abbreviation',
                            department_type: 'Type',
                            parent: 'Parent department',
                            positions: 'Positions'
                        },
                        actions: {
                            savedMessage: 'Saved.',
                            saveButton: 'Save'
                        }
                    },
                    delete: {
                        title: 'Delete Department',
                        description: 'Permanently delete this department.',
                        content: {
                            deleteInfo: 'Once a department is deleted, all of its resources and data will be permanently deleted. Before deleting this department, please download any data or information regarding this department that you wish to retain.',
                            deleteButton: 'Delete Department',
                            modal: {
                                title: 'Delete Department',
                                content: 'Are you sure you want to delete this department? Once a department is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete Department'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'List of departments',
                        description: 'Here you can find information about departments. Click on the department name link to view detailed information and to make changes.',
                        actions: {
                            createButton: 'Add'
                        }
                    }
                },
                user: {
                    head: {
                        title: 'Managing Users'
                    },
                    header: 'Managing Users',
                    create: {
                        title: 'New user',
                        description: 'Enter user information, including name, email, and other options.',
                        form: {
                            name: 'Name',
                            email: 'Email',
                            firstname: 'Firstname',
                            lastname: 'Lastname',
                            roles: 'Roles'
                        },
                        actions: {
                            createButton: 'Create'
                        }
                    },
                    update: {
                        title: 'User Information',
                        description: 'Update the user information, including the name, email, and other settings.',
                        form: {
                            name: 'Name',
                            email: 'Email',
                            firstname: 'Firstname',
                            lastname: 'Lastname',
                            roles: 'Roles'
                        },
                        actions: {
                            savedMessage: 'Saved.',
                            saveButton: 'Save'
                        }
                    },
                    delete: {
                        title: 'Delete User',
                        description: 'Permanently delete this user.',
                        content: {
                            deleteInfo: 'Once a user is deleted, all of its resources and data will be permanently deleted. Before deleting this user, please download any data or information regarding this user that you wish to retain.',
                            deleteButton: 'Delete User',
                            modal: {
                                title: 'Delete User',
                                content: 'Are you sure you want to delete this user? Once a user is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete User'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'List of users',
                        description: 'Here you can find information about users. Click on the user name link to view detailed information and to make changes.',
                        actions: {
                            createButton: 'Add'
                        },
                        form: {
                            email: 'Email',
                            find: 'Find'
                        }
                    },
                    loginAs: {
                        title: 'Login as user',
                        description: 'You will be logged in as the current user when completing operations',
                        content: {
                            info: 'Your current session will be terminated, in the meantime save your changes. This functionality is available to you at the moment, since you have been assigned the role of manager',
                            loginAsButton: 'Login as this user',
                            modal: {
                                title: 'Are you sure to log in as this user?',
                                content: 'Your current session will be terminated, in the meantime save your changes.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    continueButton: 'Continue'
                                }
                            }
                        }
                    }
                },
                role: {
                    head: {
                        title: 'Managing Roles'
                    },
                    header: 'Managing Roles',
                    create: {
                        title: 'New role',
                        description: 'Enter role information, including title, description, and other options.',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            context: 'Context',
                            users: 'Users'
                        },
                        actions: {
                            createButton: 'Create'
                        }
                    },
                    update: {
                        title: 'Role Information',
                        description: 'Update the role information, including the name, description, and other settings.',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            context: 'Context',
                            users: 'Users'
                        },
                        actions: {
                            savedMessage: 'Saved.',
                            saveButton: 'Save'
                        }
                    },
                    delete: {
                        title: 'Delete Role',
                        description: 'Permanently delete this role.',
                        content: {
                            deleteInfo: 'Once a role is deleted, all of its resources and data will be permanently deleted. Before deleting this role, please download any data or information regarding this position that you wish to retain.',
                            deleteButton: 'Delete Role',
                            modal: {
                                title: 'Delete Role',
                                content: 'Are you sure you want to delete this role? Once a role is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete Role'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'List of positions',
                        description: 'Here you can find information about positions. Click on the position name link to view detailed information and to make changes.',
                        actions: {
                            createButton: 'Add'
                        }
                    }
                },
                employement: {
                    head: {
                        title: 'Managing Employements'
                    },
                    header: 'Managing Employements',
                    create: {
                        title: 'New employer',
                        description: 'Enter employement information, including user, position, and other options.',
                        form: {
                            employement_type: 'Type',
                            department: 'Department',
                            position: 'Position',
                            department: 'User',
                            appointed_at: 'Appointed at',
                            terminated_at: 'Terminated at',
                        },
                        actions: {
                            createButton: 'Create'
                        }
                    },
                    update: {
                        title: 'Employement Information',
                        description: 'Update the employement information, including the user, position, and other settings.',
                        form: {
                            employement_type: 'Type',
                            department: 'Department',
                            position: 'Position',
                            user: 'User',
                            appointed_at: 'Appointed at',
                            terminated_at: 'Terminated at',
                        },
                        actions: {
                            savedMessage: 'Saved.',
                            saveButton: 'Save'
                        }
                    },
                    delete: {
                        title: 'Delete Employement Information',
                        description: 'Permanently delete this employement information.',
                        content: {
                            deleteInfo: 'Once a employement information is deleted, all of its resources and data will be permanently deleted. Before deleting this employement information, please download any data or information regarding this position that you wish to retain.',
                            deleteButton: 'Delete Employement Information',
                            modal: {
                                title: 'Delete Employement Information',
                                content: 'Are you sure you want to delete this employement information? Once a employement information is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete Employement Information'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'List of employements',
                        description: 'Here you can find information about user employements. Click on the name link to view detailed information and to make changes.',
                        actions: {
                            createButton: 'Add'
                        }
                    }
                },
                rating: {
                    head: {
                        title: 'Managing Ratings'
                    },
                    header: 'Managing Ratings',
                    create: {
                        title: 'New rating',
                        description: 'Create a new rating to collaborate with others on projects.',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            users: 'Users',
                            time1: 'Submission begins',
                            time2: 'Submission ends',
                            time3: 'Approvement begins',
                            time4: 'Approvement ends',
                            time5: 'Verification begins',
                            time6: 'Verification ends'
                        }
                    },
                    update: {
                        title: 'Rating Information',
                        description: 'The rating\'s name and description information.',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            users: 'Users',
                            time1: 'Submission begins',
                            time2: 'Submission ends',
                            time3: 'Approvement begins',
                            time4: 'Approvement ends',
                            time5: 'Verification begins',
                            time6: 'Verification ends'
                        }
                    },
                    delete: {
                        title: 'Delete Rating',
                        description: 'Permanently delete this rating.',
                        content: {
                            deleteInfo: 'Once a rating is deleted, all of its resources and data will be permanently deleted. Before deleting this rating, please download any data or information regarding this rating that you wish to retain.',
                            deleteButton: 'Delete Rating',
                            modal: {
                                title: 'Delete Rating',
                                content: 'Are you sure you want to delete this rating? Once a rating is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete Rating'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Rating list',
                        description: 'The ratings list which are registered.',
                        form: {
                            listInfo: 'The list of resources which are registered. Use link button to view and edit each item'
                        },
                        actions: {
                            createButton: 'Create New'
                        }
                    },
                    parameter: {
                        head: {
                            title: 'Rating management: Parameters'
                        },
                        header: 'Rating management: Parameters',
                        create: {
                            title: 'Add a new parameter',
                            description: 'Create a new parameter configuration for this rating.',
                            form: {
                                target: 'Target',
                                parameter: 'Parameter',
                                form: 'Form'
                            }
                        },
                        update: {
                            title: 'Update rating parameter',
                            description: 'Update a parameter configuration for this rating.',
                            form: {
                                target: 'Target',
                                parameter: 'Parameter',
                                form: 'Form'
                            }
                        },
                        delete: {
                            title: 'Delete Rating Parameter',
                            description: 'Permanently delete this parameter from rating.',
                            content: {
                                deleteInfo: 'Once a parameter is deleted, all of its resources and data will be permanently deleted. Before deleting this rating, please download any data or information regarding this rating that you wish to retain.',
                                deleteButton: 'Delete Parameter',
                                modal: {
                                    title: 'Delete Parameter',
                                    content: 'Are you sure you want to delete this parameter? Once a parameter is deleted, all of its resources and data will be permanently deleted.',
                                    footer: {
                                        cancelButton: 'Cancel',
                                        deleteButton: 'Delete Parameter'
                                    }
                                }
                            }
                        },
                        list: {
                            title: 'Rating parameters list',
                            description: 'The parameters of this rating which are registered.',
                            form: {
                                //
                            },
                            actions: {
                                createButton: 'Add'
                            }
                        },
                    },
                    verifier: {
                        head: {
                            title: 'Rating management: Verifers'
                        },
                        header: 'Rating management: Verifers',
                        create: {
                            title: 'Add a new verifer',
                            description: 'Create a new  verification configuration for this rating.',
                            form: {
                                target: 'Parameter target',
                                user: 'Verifier'
                            }
                        },
                        update: {
                            title: 'Update a verifer',
                            description: 'Update a verification configuration for this rating.',
                            form: {
                                target: 'Parameter target',
                                user: 'Verifier'
                            }
                        },
                        delete: {
                            title: 'Delete Verifer',
                            description: 'Permanently delete this verifer.',
                            content: {
                                deleteInfo: 'Once a verifer is deleted, all of its resources and data will be permanently deleted. Before deleting this rating, please download any data or information regarding this rating that you wish to retain.',
                                deleteButton: 'Delete Verifer',
                                modal: {
                                    title: 'Delete Verifer',
                                    content: 'Are you sure you want to delete this verifer? Once a verifer is deleted, all of its resources and data will be permanently deleted.',
                                    footer: {
                                        cancelButton: 'Cancel',
                                        deleteButton: 'Delete Verifer'
                                    }
                                }
                            }
                        },
                        list: {
                            title: 'Rating verifiers list',
                            description: 'The verifiers of this rating which are registered.',
                            form: {
                                //
                            },
                            actions: {
                                createButton: 'Create New'
                            }
                        },
                    },
                    approver: {
                        head: {
                            title: 'Rating management: Approvers'
                        },
                        header: 'Rating management: Approvers',
                        create: {
                            title: 'Add a new approver',
                            description: 'Create a new  approvement configuration for this rating.',
                            form: {
                                departments: 'Departments',
                                user: 'User'
                            }
                        },
                        update: {
                            title: 'Update a approver',
                            description: 'Update a approvement configuration for this rating.',
                            form: {
                                departments: 'Departments',
                                user: 'User'
                            }
                        },
                        delete: {
                            title: 'Delete Approver',
                            description: 'Permanently delete this approver.',
                            content: {
                                deleteInfo: 'Once a approver is deleted, all of its resources and data will be permanently deleted. Before deleting this rating, please download any data or information regarding this rating that you wish to retain.',
                                deleteButton: 'Delete Approver',
                                modal: {
                                    title: 'Delete Approver',
                                    content: 'Are you sure you want to delete this approver? Once a verifer is deleted, all of its resources and data will be permanently deleted.',
                                    footer: {
                                        cancelButton: 'Cancel',
                                        deleteButton: 'Delete Approver'
                                    }
                                }
                            }
                        },
                        list: {
                            title: 'Rating approvers list',
                            description: 'The approvers of this rating which are registered.',
                            form: {
                                //
                            },
                            actions: {
                                createButton: 'Create New'
                            }
                        },
                    }
                },
                parameter: {
                    head: {
                        title: 'Managing Parameters'
                    },
                    header: 'Managing Parameters',
                    create: {
                        title: 'New parameter',
                        description: 'Enter parameter information, including title, description, and other options.',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            parameter_target: 'Target'
                        },
                        actions: {
                            createButton: 'Create'
                        }
                    },
                    update: {
                        title: 'Parameter Information',
                        description: 'Update the parameter information, including the title, description, and other settings.',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            parameter_target: 'Target'
                        },
                        actions: {
                            savedMessage: 'Saved.',
                            saveButton: 'Save'
                        }
                    },
                    delete: {
                        title: 'Delete Parameter',
                        description: 'Permanently delete this parameter.',
                        content: {
                            deleteInfo: 'Once a parameter is deleted, all of its resources and data will be permanently deleted. Before deleting this parameter, please download any data or information regarding this parameter that you wish to retain.',
                            deleteButton: 'Delete Parameter',
                            modal: {
                                title: 'Delete Parameter',
                                content: 'Are you sure you want to delete this parameter? Once a parameter is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete Parameter'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'List of parameters',
                        description: 'Here you can find information about parameters. Click on the name link to view detailed information and to make changes.',
                        actions: {
                            createButton: 'Add'
                        }
                    }
                }
            },
            profile: {
                head: {
                    title: 'Profile'
                },
                header: 'Profile',
                updateProfileInformation: {
                    title: 'Profile Information',
                    description: 'Update your account\'s profile information and email address.',
                    form: {
                        name: 'Name',
                        email: 'Email',
                        firstname: 'Firstname',
                        lastname: 'Lastname',
                        selectNewPhotoButton: 'Select A New Photo',
                        removePhotoButton: 'Remove Photo'
                    },
                    actions: {
                        savedMessage: 'Saved.',
                        saveButton: 'Save'
                    }
                },
                updatePassword: {
                    title: 'Update Password',
                    description: 'Ensure your account is using a long, random password to stay secure.',
                    form: {
                        current_password: 'Current Password',
                        password: 'New Password',
                        password_confirmation: 'Confirm Password'
                    },
                    actions: {
                        savedMessage: 'Saved.',
                        saveButton: 'Save'
                    }
                },
                delete: {
                    title: 'Delete Account',
                    description: 'Permanently delete this user.',
                    content: {
                        deleteInfo: 'Once a account is deleted, all of its resources and data will be permanently deleted. Before deleting this account, please download any data or information regarding this account that you wish to retain.',
                        deleteButton: 'Delete Account',
                        modal: {
                            title: 'Delete Account',
                            content: 'Are you sure you want to delete this account? Once a account is deleted, all of its resources and data will be permanently deleted.',
                            footer: {
                                cancelButton: 'Cancel',
                                deleteButton: 'Delete Account'
                            }
                        }
                    }
                }
            },
            dashboard: {
                head: {
                    title: 'Dashboard'
                },
                header: 'Dashboard',
                partials: {
                    empty: 'Empty',
                    submission: {
                        noReply: 'You didn\'t send any replies'
                    },
                    verification: {
                        noReply: 'The user has not sent any responses'
                    },
                    showDate: {
                        trigger: 'Deadlines',
                        begins: 'Begins: ',
                        finishes: 'Finishes: ',
                        finished: 'Finished: ',
                        submission: 'Sending applications',
                        approvement: 'Rating approvement',
                        verification: 'Assessment sheet verification'
                    },
                    showName: {
                        trigger: 'Title'
                    },
                    showApprovement: {
                        trigger: 'Approvement status',
                        status: [
                            'Not approved',
                            'Approved',
                        ]
                    },
                    showDescription: {
                        trigger: 'Description'
                    },
                    showVerifiers: {
                        trigger: 'List of verifiers'
                    },
                    showStatistics: {
                        trigger: 'Overview',
                        score: 'Total score (excluding rejected answers)',
                        total: 'All submissions'
                    },
                    showUser: {
                        trigger: 'Assessed employee'
                    }
                },
                feed: {
                    head: {
                        title: 'Home'
                    },
                    header: 'Home',
                    content: {
                        statistics: {
                            total: 'Total',
                            submitting: 'In progress',
                            verifying: 'Verifying'
                        },
                        gettingStarted: 'Getting started',
                        placeholderMyRatings: 'List of my ratings'
                    }
                },
                verifier: {
                    head: {
                        title: 'Review'
                    },
                    header: 'Review',
                    table: {
                        header: {
                            allParticipants: 'All participants',
                            last: 'Last'
                        },
                        thead: {
                            user: 'User',
                            position: 'Position',
                            progress: 'Progress'
                        },
                        employementInfoNotFound: 'Employment information not found',
                        view: 'View'
                    },
                    form: {
                        parameter: 'Parameter',
                        clearParameter: 'Clear parameter',
                        isHaveSubmissions: 'Sent'
                    }
                },
                approver: {
                    head: {
                        title: 'Approvement'
                    },
                    header: 'Approvement',
                    table: {
                        header: {
                            allParticipants: 'All participants',
                            last: 'Last'
                        },
                        thead: {
                            user: 'User',
                            position: 'Position',
                            progress: 'Progress'
                        },
                        employementInfoNotFound: 'Employment information not found',
                        view: 'View'
                    }
                },
                submission: {
                    head: {
                        title: 'Assessment sheet'
                    },
                    header: 'Assessment sheet',
                    create: {
                        //
                    },
                    update: {
                        title: 'Submission',
                        description: 'Assessment sheet submission and it\'s details. You are allowed to update the form until submission date is not expires.',
                        form: {
                            //
                        },
                        banner: 'You cannot save changes due to assessment time is over'
                    },
                    delete: {
                        title: 'Delete the submission',
                        description: 'Permanently delete the submission',
                        content: {
                            deleteInfo: 'Once a submission is deleted, all of its resources and data will be permanently deleted. Before deleting this submission, please download any data or information regarding this field that you wish to retain.',
                            deleteButton: 'Delete submission',
                            modal: {
                                title: 'Delete a submission',
                                content: 'Are you sure you want to delete this submission? Once a is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Assessment sheet',
                        description: 'Complete the assessment sheet before the end of the current rating deadline with submissions',
                        form: {
                            updatedAt: 'Last modified',
                            verificationStatus: 'Your decision: ',
                            scoreLabel: 'Score',
                            score: '{score} pts.'
                        },
                        actions: {
                            createButton: 'Submit new responce',
                            banner: [
                                'Submission is not available due to it is early to submit responces',
                                'Submission is not available due to submission time has expired'
                            ],
                        }
                    },
                    partials: {
                        showVerifications: {
                            trigger: 'List of verifications'
                        },
                        showScoringBoard: {
                            title: 'Grade',
                            unreviewed: {
                                first_party: 'Your responce is not verified yet. You might be assigned <span class="bg-white rounded-md px-1">{score}</span> pts.',
                                third_party: 'User responce is not verified yet. User might earn <span class="bg-white rounded-md px-1">{score}</span> pts.'
                            },
                            rejected: {
                                first_party: 'Your responce is rejected by one of verifiers.',
                                third_party: 'User responce is rejected by one of verifiers.'
                            },
                            fix_require: {
                                first_party: 'One of verifiers required a fix, then your current score <span class="bg-white rounded-md px-1">{score}</span> might be changed.',
                                third_party: 'One of verifiers required a fix, then user\'s score <span class="bg-white rounded-md px-1">{score}</span> might be changed.'
                            },
                            fixed_and_accepted: {
                                first_party: 'You have earned <span class="bg-white rounded-md px-1">{score}</span> pts. with сonsidering verifier fixes.',
                                third_party: 'User has earned <span class="bg-white rounded-md px-1">{score}</span> pts. with considering verifier fixes.'
                            },
                            accepted: {
                                first_party: 'You have earned <span class="bg-white rounded-md px-1">{score}</span> pts.',
                                third_party: 'User has earned <span class="bg-white rounded-md px-1">{score}</span> pts.'
                            },
                            form: {
                                scoring: {
                                    disabled: 'This form has not been assigned an evaluation function',
                                    by_constant: 'Score is assigned according to a predefined form value',
                                    by_math_expression: 'The score is calculated according to the formula  <span class="bg-white rounded-md px-1">{math_expression}</span>, where:'
                                }
                            }
                        }
                    }
                },
                verification: {
                    head: {
                        title: 'Checking the evaluation sheet'
                    },
                    header: 'Checking the evaluation sheet',
                    create: {
                        //
                    },
                    update: {
                        title: 'Responce Confirmation',
                        description: 'You have been given access to review and approve the employee\'s evaluation sheet. Go through the records to confirm the assessment.',
                        form: {
                            //
                        },
                        actions: {
                            makeOrChangeDecisionButton: 'Make or change decision',
                            modal: {
                                title: 'Your decision',
                                content: {
                                    verification_status: 'Decision',
                                    message: 'Accompanying message'
                                },
                                footer: {
                                    cancelButton: 'Cancel',
                                    updateButton: 'Save'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Evaluation sheet',
                        description: 'Fill out the evaluation sheet before the end of the current rating period with materials',
                        form: {
                            score: '{score} points'
                        }
                    },
                    partials: {
                        showVerifications: {
                            trigger: 'List of confirmations'
                        },
                        showStatus: {
                            trigger: 'Your decision'
                        }
                    }
                }
            },
            forms: {
                form: {
                    head: {
                        title: 'Form management'
                    },
                    header: 'Form management',
                    create: {
                        title: 'Create a form',
                        description: 'Enter the name and description of the form',
                        form: {
                            name: 'Name',
                            description: 'Description'
                        },
                        actions: {
                            createButton: 'Create'
                        }
                    },
                    update: {
                        title: 'Update the form',
                        description: 'Update the name and description of the form',
                        form: {
                            name: 'Name',
                            description: 'Description'
                        },
                        actions: {
                            savedMessage: 'Saved.',
                            saveButton: 'Save'
                        }
                    },
                    updateScoring: {
                        title: 'Form scoring',
                        description: 'Update the form scoring policy',
                        form: {
                            scoring: 'Scoring',
                            score: 'Score',
                            math_expression: 'Math expression',
                            variables: 'The list of variables which could be used in math expression. Note: To declare a new variable visit form field update page.'
                        },
                        actions: {
                            savedMessage: 'Saved.',
                            saveButton: 'Save'
                        },
                        scoring: {
                            disabled: {
                                name: 'Disabled',
                                description: 'The scoring is disabled for the form by default'
                            },
                            by_constant: {
                                name: 'By Constant',
                                description: 'Calculate score by pre-entered constant value'
                            },
                            by_math_expression: {
                                name: 'By Math Expression',
                                description: 'Calculate score by math expression'
                            }
                        }
                    },
                    delete: {
                        title: 'Delete the form',
                        description: 'Permanently delete the form',
                        content: {
                            deleteInfo: 'Once a form is deleted, all of its resources and data will be permanently deleted. Before deleting this form, please download any data or information regarding this field that you wish to retain.',
                            deleteButton: 'Delete form',
                            modal: {
                                title: 'Delete a form',
                                content: 'Are you sure you want to delete this form? Once a is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Forms',
                        description: 'Create and manage forms',
                        form: {
                            listInfo: 'The list of created forms.'
                        },
                        actions: {
                            createButton: 'Create'
                        }
                    },
                },
                formField: {
                    head: {
                        title: 'Form management'
                    },
                    header: 'Form management',
                    create: {
                        title: 'Create a field',
                        description: 'Enter the label, type, validation rules, and other form field parameters',
                        form: {
                            label: 'Label',
                            type: 'Type',
                            variable: 'Variable',
                            validation_rules: 'Validation Rules'
                        },
                        actions: {
                            createButton: 'Create'
                        }
                    },
                    update: {
                        title: 'Update the form field',
                        description: 'Update the label, type, validation rules, and other form field parameters',
                        form: {
                            label: 'Label',
                            type: 'Type',
                            variable: 'Variable',
                            validation_rules: 'Validation Rules'
                        },
                        actions: {
                            savedMessage: 'Saved.',
                            saveButton: 'Save'
                        }
                    },
                    delete: {
                        title: 'Delete the form field',
                        description: 'Permanently delete the form field',
                        content: {
                            deleteInfo: 'Once a form field is deleted, all of its resources and data will be permanently deleted. Before deleting this field, please download any data or information regarding this field that you wish to retain.',
                            deleteButton: 'Delete form field',
                            modal: {
                                title: 'Delete a form field',
                                content: 'Are you sure you want to delete this form field? Once a field is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Form fields',
                        description: 'Create and manage form fields',
                        actions: {
                            createButton: 'Create'
                        }
                    },
                    type: {
                        number: {
                            name: 'Number',
                            description: 'Numeric data'
                        },
                        text: {
                            name: 'Text',
                            description: 'Text or string data'
                        },
                        textarea: {
                            name: 'Textarea',
                            description: 'Text or paragraph'
                        },
                        email: {
                            name: 'Email',
                            description: 'Email address'
                        },
                        url: {
                            name: 'Url',
                            description: 'Url link'
                        },
                        select: {
                            name: 'Select',
                            description: 'Select from the list'
                        },
                        multiselect: {
                            name: 'Multiselect',
                            description: 'Multiple selection from the list'
                        },
                        file: {
                            name: 'File',
                            description: 'Upload file'
                        },
                        time: {
                            name: 'Time',
                            description: 'Time h:m:s'
                        },
                        date: {
                            name: 'Date',
                            description: 'Date year/month/day'
                        },
                        datetime: {
                            name: 'Datetime',
                            description: 'Date and time year/month/day h:m:s'
                        },
                        datetime_local: {
                            name: 'Datetime Local',
                            description: 'Date and time with timezone year/month/day h:m:s ZZ'
                        },
                    },
                    validation_rules: {
                        mimes: {
                            'doc': {
                                name: '.doc',
                                description: 'Microsoft Word 1993'
                            },
                            'docx': {
                                name: '.docx',
                                description: 'Microsoft Word 2007'
                            },
                            'rtf': {
                                name: '.rtf',
                                description: 'Rich Text Format'
                            },
                            'xls': {
                                name: '.xls',
                                description: 'Microsoft Excel 1993'
                            },
                            'xlsx': {
                                name: '.xlsx',
                                description: 'Microsoft Excel 2007'
                            },
                            'ppt': {
                                name: '.ppt',
                                description: 'Microsoft Power Point 1993'
                            },
                            'pptx': {
                                name: '.pptx',
                                description: 'Microsoft Power Point 2007'
                            },
                            'xml': {
                                name: '.xml',
                                description: 'eXtensible Markup Language'
                            },
                            'csv': {
                                name: '.csv',
                                description: 'Comma-Separated Values'
                            },
                            'pdf': {
                                name: '.pdf',
                                description: 'Portable Document Format'
                            },
                            'png': {
                                name: '.png',
                                description: 'Portable Network Graphics'
                            },
                            'jpg': {
                                name: '.jpg',
                                description: 'Joint Photographic Experts Group'
                            },
                            'jpeg': {
                                name: '.jpeg',
                                description: 'Joint Photographic Experts Group'
                            },
                            'gif': {
                                name: '.gif',
                                description: 'Graphics Interchange Format'
                            },
                            'mp3': {
                                name: '.mp3',
                                description: 'MPEG-1/2/2.5 Layer 3'
                            },
                            'wav': {
                                name: '.wav',
                                description: 'Waveform Audio File Format'
                            },
                            'wma': {
                                name: '.wma',
                                description: 'Windows Media Audio'
                            },
                            'aac': {
                                name: '.aac',
                                description: 'Advanced Audio Coding'
                            },
                            'mp4': {
                                name: '.mp4',
                                description: 'ISO Base Media File Format (MPEG-4 Part 12)'
                            },
                            'avi': {
                                name: '.avi',
                                description: 'Audio Video Interleave'
                            },
                            'mov': {
                                name: '.mov',
                                description: 'QuickTime multimedia file format; Metal oxide varistor'
                            }
                        }
                    },
                },
                formFieldOption: {
                    head: {
                        title: 'Form management'
                    },
                    header: 'Form management',
                    create: {
                        title: 'Create an option',
                        description: 'Create a new form field option by inserting name and description',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            score: 'Score'
                        }
                    },
                    update: {
                        title: 'Update field option',
                        description: 'Update the existing form field option: modify name and description',
                        form: {
                            name: 'Name',
                            description: 'Description',
                            score: 'Score'
                        }
                    },
                    delete: {
                        title: 'Delete field option',
                        description: 'Permanently delete the form field option',
                        content: {
                            deleteInfo: 'Once a form field option is deleted, all of its resources and data will be permanently deleted. Before deleting this field option, please download any data or information regarding this field option that you wish to retain.',
                            deleteButton: 'Delete form field option',
                            modal: {
                                title: 'Delete a form field option',
                                content: 'Are you sure you want to delete this form field option? Once a field option is deleted, all of its resources and data will be permanently deleted.',
                                footer: {
                                    cancelButton: 'Cancel',
                                    deleteButton: 'Delete'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Form field options',
                        description: 'Create and manage form field options',
                        form: {
                            listInfo: 'The list of created form field options.'
                        },
                        actions: {
                            createButton: 'Create a new form filed option'
                        }
                    }
                },
            },
            wizards: {
                submission: {
                    head: {
                        title: 'Responce submission'
                    },
                    header: 'Responce submission',
                    showTitle: {
                        title: 'Responce submission',
                        description: 'Select the target and evaluation parameter, fill out the form. At the end of your responce, information about the rating of this answer will be provided.',
                    },
                    showSteps: {
                        trigger: 'Execution steps',
                        step: 'Step {number}'
                    },
                    steps: {
                        selectParameterTargetStep: {
                            title: 'Select Target',
                            form: {
                                parameter_target: 'Target'
                            },
                            actions: {
                                nextStepButton: 'Next'
                            }
                        },
                        selectParameterStep: {
                            title: 'Select Parameter',
                            form: {
                                parameter: 'Parameter'
                            },
                            actions: {
                                nextStepButton: 'Next'
                            }
                        },
                        formFillingStep: {
                            title: 'Fill the form',
                            form: {
                                //
                            },
                            actions: {
                                saveButton: 'Save'
                            }
                        }
                    }
                }
            },
            welcome: {
                head: {
                    title: 'Welcome'
                },
                organization: {
                    title: 'Organization'
                },
                statistics: {
                    title: 'Statistics',
                    description: 'The system collects statistics based on the analysis of the performance of employees. The configuration of this module is detailed in the user manual.'
                },
                userManual: {
                    title: 'User manual',
                    description: 'Evaluation of the activities of employees of the organization is carried out on the basis of an analysis of the results of their activities for the assessment period in accordance with the list of assessed parameters. The results of the assessment of the work of employees are drawn up in the form of summary tables of the "Evaluation Sheet" and submitted to the commission with all supporting documents. For more details follow the link.'
                },
                aboutSystem: {
                    title: 'About system',
                    description: 'The system determines the procedure, timing and methodology for performance evaluation employees of the organization and regulates the issues of determining allowances for salary of a staff member.'
                }
            },
            userManual: {
                head: {
                    title: 'User manual'
                }
            }
        },
        layouts: {
            authenticated: {
                triggers: {
                    administration: 'Administration',
                    management: 'Management',
                    locale: 'Language'
                },
                linkGroups: {
                    siteSettings: 'Website settings',
                    manageEntities: 'Manage entitites',
                    manageRating: 'Manage assignments',
                    notifications: 'Notifications'
                },
                links: {
                    authentication: 'Authentication',
                    dashboard: 'Dashboard',
                    dashboardUser: 'Home',
                    dashboardVerifier: 'Review',
                    dashboardApprover: 'Approve',
                    positions: 'Positions',
                    departments: 'Departments',
                    users: 'Users',
                    roles: 'Roles',
                    employements: 'Employements',
                    ratings: 'Rating',
                    parameters: 'Parameters',
                    verifiers: 'Verifers',
                    profile: 'Profile',
                    logout: 'Log out',
                    locales: {
                        ru: 'Russian',
                        en: 'English'
                    }
                }
            }
        },
        components: {
            banner: {
                resource: {
                    created: 'Record created successfully! <a class="underline" href="{href}">Switch to record</a>',
                    updated: 'Record updated successfully!',
                    deleted: 'Record deleted successfully!'
                }
            },
            fileInput: {
                uploadFileButton: 'Upload a new file',
                downloadFileButton: 'Download file',
                removeFileButton: 'Remove file',
                noFileChosenMessage: 'No file chosen',
                modal: {
                    title: 'Are you sure to delete this file',
                    content: 'After deletion, the file will be destroyed without the possibility of recovery.',
                    footer: {
                        cancelButton: 'Cancel',
                        deleteButton: 'Delete'
                    }
                }
            },
            select: {
                selectTitle: 'Select',
                multipleSelectTitle: 'Multiple select',
                closeButton: 'Close'
            }
        },
        generic: {
            updateButton: 'Update'
        }
    },
    ru: {
        pages: {
            administration: {},
            management: {
                position: {
                    head: {
                        title: 'Управление должностями'
                    },
                    header: 'Управление должностями',
                    create: {
                        title: 'Новая должность',
                        description: 'Введите информацию должности, включая название, описание и другие параметры.',
                        form: {
                            name: 'Название',
                            description: 'Описание'
                        },
                        actions: {
                            createButton: 'Создать'
                        }
                    },
                    update: {
                        title: 'Информация должности',
                        description: 'Обновите информацию должности, включая название, описание и другие параметры.',
                        form: {
                            name: 'Название',
                            description: 'Описание'
                        },
                        actions: {
                            savedMessage: 'Сохранено.',
                            saveButton: 'Создать'
                        }
                    },
                    delete: {
                        title: 'Удалить должность',
                        description: 'Удалить эту должность навсегда.',
                        content: {
                            deleteInfo: 'После удаления позиции все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой позиции, пожалуйста, загрузите любые данные или информацию относительно этой позиции, которые вы хотите сохранить.',
                            deleteButton: 'Удалить должность',
                            modal: {
                                title: 'Удалить должность',
                                content: 'Вы уверены, что хотите удалить эту должность? После удаления должности все ее ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить должность'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Список должностей',
                        description: 'Здесь вы можете найти информацию о должностях. Перейдите по ссылке названия должности для просмотра подробной информации, а также для внесения изменений.',
                        actions: {
                            createButton: 'Добавить'
                        }
                    }
                },
                department: {
                    head: {
                        title: 'Управление отделами'
                    },
                    header: 'Управление отделами',
                    create: {
                        title: 'Новый отдел',
                        description: 'Введите информацию отдела, включая название, описание и другие параметры.',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            abbreviation: 'Сокращенное название',
                            department_type: 'Тип',
                            parent: 'Родительский отдел',
                            positions: 'Должности'
                        },
                        actions: {
                            createButton: 'Создать'
                        }
                    },
                    update: {
                        title: 'Информация отдела',
                        description: 'Обновите информацию отдела, включая название, описание и другие параметры.',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            abbreviation: 'Сокращенное название',
                            department_type: 'Тип',
                            parent: 'Родительский отдел',
                            positions: 'Должности'
                        },
                        actions: {
                            savedMessage: 'Сохранено.',
                            saveButton: 'Сохранить'
                        }
                    },
                    delete: {
                        title: 'Удалить отдел',
                        description: 'Удалить этот отдел навсегда.',
                        content: {
                            deleteInfo: 'После удаления отдела все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением отдела, пожалуйста, загрузите любые данные или информацию относительно этой отеделении, которые вы хотите сохранить.',
                            deleteButton: 'Удалить отдел',
                            modal: {
                                title: 'Удалить отдел',
                                content: 'Вы уверены, что хотите удалить этот отдел? После удаления отдела все ее ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить отдел'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Список отделов',
                        description: 'Здесь вы можете найти информацию об отделах. Перейдите по ссылке названия отдела для просмотра подробной информации, а также для внесения изменений.',
                        actions: {
                            createButton: 'Добавить'
                        }
                    }
                },
                user: {
                    head: {
                        title: 'Управление пользователями'
                    },
                    header: 'Управление пользователями',
                    create: {
                        title: 'Новый пользователь',
                        description: 'Введите данные пользователя, включая имя, электронную почту и другие параметры.',
                        form: {
                            name: 'Имя пользователя',
                            email: 'Электронная почта',
                            firstname: 'Имя',
                            lastname: 'Фамилия',
                            roles: 'Роли'
                        },
                        actions: {
                            createButton: 'Создать'
                        }
                    },
                    update: {
                        title: 'Информация пользователя',
                        description: 'Обновите информацию пользователя, включая имя, электронную почту и другие параметры.',
                        form: {
                            name: 'Имя пользователя',
                            email: 'Электронная почта',
                            firstname: 'Имя',
                            lastname: 'Фамилия',
                            roles: 'Роли'
                        },
                        actions: {
                            savedMessage: 'Сохранено.',
                            saveButton: 'Сохранить'
                        }
                    },
                    delete: {
                        title: 'Удалить пользователя',
                        description: 'Удалить этого пользователя навсегда.',
                        content: {
                            deleteInfo: 'После удаления пользователя все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением данного пользователя, пожалуйста, загрузите любые данные или информацию относительно этого пользователя, которые вы хотите сохранить.',
                            deleteButton: 'Удалить пользователя',
                            modal: {
                                title: 'Удалить пользователя',
                                content: 'Вы уверены, что хотите удалить этого пользователя? После удаления отеделении все ее ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить пользователя'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Список пользователей',
                        description: 'Здесь вы можете найти информацию о пользователях. Перейдите по ссылке имени пользователя для просмотра подробной информации, а также для внесения изменений.',
                        actions: {
                            createButton: 'Добавить'
                        },
                        form: {
                            email: 'Почта',
                            find: 'Найти'
                        }
                    },
                    loginAs: {
                        title: 'Войти в систему под именем текущего пользователя',
                        description: 'При завершений операций вы зайдете в систему под именем текущего пользователя',
                        content: {
                            info: 'Ваш текущий сеанс будет завершен, тем временем сохраните измененные данные. Данный функционал доступен вам на текущий момент, поскольку вам присвоено роль управляющего',
                            loginAsButton: 'Войти под именем пользователя',
                            modal: {
                                title: 'Вы действительно хотите зайти в систему под именем данного пользователя?',
                                content: 'Ваш текущий сеанс будет завершен, тем временем сохраните измененные данные.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    continueButton: 'Продолжить'
                                }
                            }
                        }
                    }
                },
                role: {
                    head: {
                        title: 'Управление ролями'
                    },
                    header: 'Управление ролями',
                    create: {
                        title: 'Новый роль',
                        description: 'Введите информацию роля, включая название, описание и другие параметры.',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            context: 'Контекст',
                            users: 'Пользователи'
                        },
                        actions: {
                            createButton: 'Создать'
                        }
                    },
                    update: {
                        title: 'Информация роли',
                        description: 'Обновите информацию роли, включая название, описание и другие параметры.',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            context: 'Контекст',
                            users: 'Пользователи'
                        },
                        actions: {
                            savedMessage: 'Сохранено.',
                            saveButton: 'Сохранить'
                        }
                    },
                    delete: {
                        title: 'Удалить роль',
                        description: 'Удалить эту роль навсегда.',
                        content: {
                            deleteInfo: 'После удаления позиции все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой роли, пожалуйста, загрузите любые данные или информацию относительно этой позиции, которые вы хотите сохранить.',
                            deleteButton: 'Удалить роль',
                            modal: {
                                title: 'Удалить роль',
                                content: 'Вы уверены, что хотите удалить эту роль? После удаления роли все ее ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить роль'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Список ролей',
                        description: 'Здесь вы можете найти информацию о ролях. Перейдите по ссылке названия роли для просмотра подробной информации, а также для внесения изменений.',
                        actions: {
                            createButton: 'Добавить'
                        }
                    }
                },
                employement: {
                    head: {
                        title: 'Управление трудоустройством пользователей'
                    },
                    header: 'Управление трудоустройством пользователей',
                    create: {
                        title: 'Новая позиция',
                        description: 'Введите данные пользователя и занимаемой должности, включая имя, электронную отдел и другие параметры.',
                        form: {
                            employement_type: 'Вид трудоустройства',
                            department: 'Отдел',
                            position: 'Должность',
                            department: 'Пользователь',
                            appointed_at: 'Назначен в',
                            terminated_at: 'Прекращено в',
                        },
                        actions: {
                            createButton: 'Create'
                        }
                    },
                    update: {
                        title: 'Информация о занятости',
                        description: 'Сведения о занятости пользователя.',
                        form: {
                            employement_type: 'Вид трудоустройства',
                            department: 'Отдел',
                            position: 'Позиция',
                            user: 'Пользователь',
                            appointed_at: 'Назначен в',
                            terminated_at: 'Прекращено в',
                        },
                        actions: {
                            savedMessage: 'Сохранено.',
                            saveButton: 'Сохранить'
                        }
                    },
                    delete: {
                        title: 'Удалить информацию о занятости',
                        description: 'Удалить информацию о занятости без возможности восстановления.',
                        content: {
                            deleteInfo: 'После удаления информации о занятости все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением информации, пожалуйста, загрузите любые данные или информацию об этой должности, которые вы хотите сохранить.',
                            deleteButton: 'Удалить информацию о занятости',
                            modal: {
                                title: 'Удалить информацию о занятости',
                                content: 'Вы уверены, что хотите удалить эту информацию о занятости? После удаления информации о занятости все ее ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить информацию о занятости'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Трудоустройство пользователей',
                        description: 'Здесь вы можете найти информацию о занятости пользователей. Нажмите на ссылку имени, чтобы просмотреть подробности и внести изменения.',
                        actions: {
                            createButton: 'Добавить'
                        }
                    }
                },
                rating: {
                    head: {
                        title: 'Управление оценкой персонала'
                    },
                    header: 'Управление оценкой персонала',
                    create: {
                        title: 'Новый экземпляр оценки персонала',
                        description: 'Создайте новую экземпляр оценки персонала, чтобы сотрудничать с другими над проектами.',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            users: 'Пользователи',
                            time1: 'Начало отправки ответов',
                            time2: 'Завершение отправки ответов',
                            time3: 'Начало утверждения',
                            time4: 'Завершение утверждения',
                            time5: 'Начало проверки',
                            time6: 'Завершение проверки'
                        }
                    },
                    update: {
                        title: 'Обновить экземпляр оценки персонала',
                        description: 'Информация о названии и описании экземпляра оценки персонала.',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            users: 'Пользователи',
                            time1: 'Начало отправки ответов',
                            time2: 'Завершение отправки ответов',
                            time3: 'Начало утверждения',
                            time4: 'Завершение утверждения',
                            time5: 'Начало проверки',
                            time6: 'Завершение проверки'
                        }
                    },
                    delete: {
                        title: 'Удалить экземпляр оценки персонала',
                        description: 'Удалить эту экземпляр оценки персонала навсегда.',
                        content: {
                            deleteInfo: 'После удаления экземпляр оценки персонала все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой экземпляр оценки персонала, пожалуйста, загрузите любые данные или информацию относительно этой экземпляр оценки персонала, которые вы хотите сохранить.',
                            deleteButton: 'Удалить экземпляр оценки персонала',
                            modal: {
                                title: 'Удалить экземпляр оценки персонала',
                                content: 'Вы уверены, что хотите удалить эту экземпляр оценки персонала? После удаления экземпляра оценки персонала все ее ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить экземпляр оценки персонала'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Список оцениваний',
                        description: 'Список оцениваний, которые зарегистрированы.',
                        form: {
                            listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента'
                        },
                        actions: {
                            createButton: 'Создайте новый'
                        }
                    },
                    parameter: {
                        head: {
                            title: 'Настройка параметров'
                        },
                        header: 'Настройка параметров',
                        create: {
                            title: 'Добавить новый параметр',
                            description: 'Создайте новую конфигурацию параметра оценки для этого рейтинга.',
                            form: {
                                parameter_target: 'Направление деятельности',
                                parameter: 'Параметр',
                                form: 'Форма'
                            }
                        },
                        update: {
                            title: 'Обновить параметр оцнивания',
                            description: 'Обновить конфигурацию параметра для этого рейтинга.',
                            form: {
                                parameter_target: 'Направление деятельности',
                                parameter: 'Параметр',
                                form: 'Форма'
                            }
                        },
                        list: {
                            title: 'Настройка параметров',
                            description: 'Список параметров оценивания. Настройка параметров оценивания задается формой заполнения.',
                            form: {
                                //
                            },
                            actions: {
                                createButton: 'Добавить'
                            }
                        },
                        delete: {
                            title: 'Удалить параметр оценки',
                            description: 'Удалить параметр оценки.',
                            content: {
                                deleteInfo: 'После удаления параметра оценки все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой экземпляр оценки персонала, пожалуйста, загрузите любые данные или информацию относительно этой экземпляр оценки персонала, которые вы хотите сохранить.',
                                deleteButton: 'Удалить параметр оценки',
                                modal: {
                                    title: 'Удалить параметр оценки',
                                    content: 'Вы уверены, что хотите удалить параметр оценки? После удаления экземпляра оценки персонала все ее ресурсы и данные будут удалены без возможности восстановления.',
                                    footer: {
                                        cancelButton: 'Отмена',
                                        deleteButton: 'Удалить параметр оценки'
                                    }
                                }
                            }
                        }
                    },
                    verifier: {
                        head: {
                            title: 'Настройка подтверждения'
                        },
                        header: 'Настройка подтверждения',
                        create: {
                            title: 'Добавить нового подтверждающего',
                            description: 'Создайте новую конфигурацию подтверждения для этого рейтинга.',
                            form: {
                                target: 'Направление деятельности',
                                user: 'Подтверждающий'
                            }
                        },
                        update: {
                            title: 'Обновить подтверждающего',
                            description: 'Обновить конфигурацию подтверждения для этого рейтинга.',
                            form: {
                                target: 'Направление деятельности',
                                user: 'Подтверждающий'
                            }
                        },
                        list: {
                            title: 'Настройка подтверждения',
                            description: 'Список подтверждающих данное оценивание. Подтверждающие прикрепляются к определенному направлению деятельности оценивания.',
                            form: {
                                //
                            },
                            actions: {
                                createButton: 'Добавить'
                            }
                        },
                        delete: {
                            title: 'Удалить подтверждающего оценки персонала',
                            description: 'Удалить подтверждающего оценки персонала навсегда.',
                            content: {
                                deleteInfo: 'После удаления эподтверждающего все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой экземпляр оценки персонала, пожалуйста, загрузите любые данные или информацию относительно этой экземпляр оценки персонала, которые вы хотите сохранить.',
                                deleteButton: 'Удалить подтверждающего оценки персонала',
                                modal: {
                                    title: 'Удалить подтверждающего оценки персонала',
                                    content: 'Вы уверены, что хотите удалить эту подтверждающего оценки персонала? После удаления экземпляра оценки персонала все ее ресурсы и данные будут удалены без возможности восстановления.',
                                    footer: {
                                        cancelButton: 'Отмена',
                                        deleteButton: 'Удалить подтверждающего оценки персонала'
                                    }
                                }
                            }
                        }
                    },
                    approver: {
                        head: {
                            title: 'Настройка утверждения'
                        },
                        header: 'Настройка утверждения',
                        create: {
                            title: 'Add a new approver',
                            description: 'Create a new  approvement configuration for this rating.',
                            form: {
                                departments: 'Отделы',
                                user: 'Пользователь'
                            }
                        },
                        update: {
                            title: 'Update a approver',
                            description: 'Update a approvement configuration for this rating.',
                            form: {
                                departments: 'Отделы',
                                user: 'Пользователь'
                            }
                        },
                        delete: {
                            title: 'Удалить утверждающего',
                            description: 'Permanently delete this approver.',
                            content: {
                                deleteInfo: 'Once a approver is deleted, all of its resources and data will be permanently deleted. Before deleting this rating, please download any data or information regarding this rating that you wish to retain.',
                                deleteButton: 'Delete Approver',
                                modal: {
                                    title: 'Delete Approver',
                                    content: 'Are you sure you want to delete this approver? Once a verifer is deleted, all of its resources and data will be permanently deleted.',
                                    footer: {
                                        cancelButton: 'Cancel',
                                        deleteButton: 'Delete Approver'
                                    }
                                }
                            }
                        },
                        list: {
                            title: 'Настройка утверждения',
                            description: 'Список утверждающих данное оценивание. Утверждающие прикрепляются к определенному направлению деятельности оценивания.',
                            form: {
                                //
                            },
                            actions: {
                                createButton: 'Добавить'
                            }
                        }
                    }
                },
                parameter: {
                    head: {
                        title: 'Управление параметрами оценки'
                    },
                    header: 'Управление параметрами оценки',
                    create: {
                        title: 'Новый параметр',
                        description: 'Введите данные параметра, включая название, описание и другие параметры.',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            parameter_target: 'Направление деятельности'
                        },
                        actions: {
                            createButton: 'Создать'
                        }
                    },
                    update: {
                        title: 'Информация параметра',
                        description: 'Обновите информацию параметра, включая название, описание и другие данные.',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            parameter_target: 'Направление деятельности'
                        },
                        actions: {
                            savedMessage: 'Сохранено.',
                            saveButton: 'Сохранить'
                        }
                    },
                    delete: {
                        title: 'Удалить параметр оценки',
                        description: 'Удалить текущий параметр оценки навсегда.',
                        content: {
                            deleteInfo: 'После удаления параметра оценки все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением параметра, пожалуйста, загрузите любые данные или информацию относительно данного параметра, которые вы хотите сохранить.',
                            deleteButton: 'Удалить параметр оценки',
                            modal: {
                                title: 'Удалить параметр оценки',
                                content: 'Вы уверены, что хотите удалить этот параметр? После удаления параметра оценки все ее ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить параметр оценки'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Список параметров оценки',
                        description: 'Здесь вы можете найти информацию о параметрах оценки. Перейдите по ссылке названия параметра для просмотра подробной информации, а также для внесения изменений.',
                        actions: {
                            createButton: 'Добавить'
                        }
                    }
                }
            },
            profile: {
                head: {
                    title: 'Профиль'
                },
                header: 'Профиль',
                updateProfileInformation: {
                    title: 'Информация профиля',
                    description: 'Обновите информацию в профиле вашей учетной записи и адрес электронной почты.',
                    form: {
                        name: 'Имя пользователя',
                        email: 'Эл. адрес',
                        firstname: 'Имя',
                        lastname: 'Фамилия',
                        selectNewPhotoButton: 'Выбрать новую фотографию',
                        removePhotoButton: 'Удалить фото'
                    },
                    actions: {
                        savedMessage: 'Сохранено.',
                        saveButton: 'Сохранить'
                    }
                },
                updatePassword: {
                    title: 'Обновить пароль',
                    description: 'Убедитесь, что в вашей учетной записи используется длинный случайный пароль, чтобы оставаться в безопасности.',
                    form: {
                        current_password: 'Текущий пароль',
                        password: 'Новый пароль',
                        password_confirmation: 'Подтвердите пароль'
                    },
                    actions: {
                        savedMessage: 'Сохранено.',
                        saveButton: 'Сохранить'
                    }
                },
                delete: {
                    title: 'Удалить аккаунт',
                    description: 'Удалить этого пользователя без возможности восстановления.',
                    content: {
                        deleteInfo: 'После удаления учетной записи все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой учетной записи загрузите любые данные или информацию об этой учетной записи, которые вы хотите сохранить.',
                        deleteButton: 'Удалить аккаунт',
                        modal: {
                            title: 'Удалить аккаунт',
                            content: 'Вы уверены, что хотите удалить эту учетную запись? После удаления учетной записи все ее ресурсы и данные будут удалены без возможности восстановления.',
                            footer: {
                                cancelButton: 'Отмена',
                                deleteButton: 'Удалить аккаунт'
                            }
                        }
                    }
                }
            },
            dashboard: {
                head: {
                    title: 'Панель управления'
                },
                header: 'Панель управления',
                partials: {
                    empty: 'Пусто',
                    submission: {
                        noReply: 'Вы не отправили ответов'
                    },
                    verification: {
                        noReply: 'Сотрудник не отправил ответов'
                    },
                    showDate: {
                        trigger: 'Сроки выполнения',
                        begins: 'Начинается: ',
                        finishes: 'Завершается: ',
                        finished: 'Завершено: ',
                        submission: 'Отправка заявок',
                        approvement: 'Утверждение рейтинга',
                        verification: 'Подтверждение рейтинга'
                    },
                    showName: {
                        trigger: 'Название'
                    },
                    showApprovement: {
                        trigger: 'Статус утверждения заявок',
                        status: [
                            'Не утверждено',
                            'Утверждено',
                        ]
                    },
                    showDescription: {
                        trigger: 'Описание'
                    },
                    showVerifiers: {
                        trigger: 'Список подтверждающих'
                    },
                    showStatistics: {
                        trigger: 'Обзор',
                        score: 'Суммарный балл (без учета отклоненных и не расмотренных ответов)',
                        total: 'Всего отправленных ответов'
                    },
                    showUser: {
                        trigger: 'Оцениваемый сотрудник'
                    }
                },
                feed: {
                    head: {
                        title: 'Главная'
                    },
                    header: 'Главная',
                    content: {
                        statistics: {
                            total: 'Всего',
                            submitting: 'Выполняется',
                            verifying: 'На проверке'
                        },
                        gettingStarted: 'Приступая к работе',
                        placeholderMyRatings: 'Мои рейтинги'
                    }
                },
                verifier: {
                    head: {
                        title: 'Проверка и подтверждение'
                    },
                    header: 'Проверка и подтверждение',
                    table: {
                        header: {
                            allParticipants: 'Все участники',
                            last: 'Всего осталось'
                        },
                        thead: {
                            user: 'Сотрудник',
                            position: 'Занимаемая должность',
                            progress: 'Прогресс'
                        },
                        employementInfoNotFound: 'Информация о занятости не найдено',
                        view: 'Посмотреть'
                    },
                    form: {
                        parameter: 'Параметр',
                        parameterClear: 'Очистить параметр',
                        isHaveSubmissions: 'Отправлял'
                    }
                },
                approver: {
                    head: {
                        title: 'Утверждение'
                    },
                    header: 'Утверждение',
                    table: {
                        header: {
                            allParticipants: 'Все участники',
                            last: 'Всего осталось'
                        },
                        thead: {
                            user: 'Сотрудник',
                            position: 'Занимаемая должность',
                            progress: 'Прогресс'
                        },
                        employementInfoNotFound: 'Информация о занятости не найдено',
                        view: 'Посмотреть'
                    }
                },
                submission: {
                    head: {
                        title: 'Лист оценки'
                    },
                    header: 'Лист оценки',
                    create: {
                        //
                    },
                    update: {
                        title: 'Детали ответа',
                        description: 'Представление оценочного листа и его детали. Вам разрешено обновлять форму до тех пор, пока дата отправки не истечет.',
                        form: {
                            //
                        },
                        banner: 'Вы не можете обновить ответ так как время оценивания истекло!'
                    },
                    delete: {
                        title: 'Удалить ответ',
                        description: 'Навсегда удалить ответ',
                        content: {
                            deleteInfo: 'После удаления представления все его ресурсы и данные будут безвозвратно удалены. Перед удалением этой отправки загрузите любые данные или информацию, касающиеся этого поля, которые вы хотите сохранить.',
                            deleteButton: 'Удалить ответ',
                            modal: {
                                title: 'Удалить ответ',
                                content: 'Вы уверены, что хотите удалить это представление? После удаления все его ресурсы и данные будут безвозвратно удалены.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Лист оценки',
                        description: 'Заполните оценочный лист до окончания текущего срока рейтинга с материалами',
                        form: {
                            updatedAt: 'Последнее изменение',
                            verificationStatus: 'Ваше решение: ',
                            scoreLabel: 'Баллы',
                            score: '{score} баллов'
                        },
                        actions: {
                            createButton: 'Отправить новый ответ'
                        },
                        banner: [
                            'Отправка ответов невозможноно, так как время для отправки ответов еще не началось',
                            'Отправка ответов невозможноно, так как время для отправки ответов просрочилась'
                        ]
                    },
                    partials: {
                        showVerifications: {
                            trigger: 'Статус проверки'
                        },
                        showScoringBoard: {
                            title: 'Оценка',
                            unreviewed: {
                                first_party: 'Ваш ответ еще не подтвержден, текущая оценка <span class="bg-white rounded-md px-1">{score}</span> баллов.',
                                third_party: 'Ответ пользователя еще не подтвержден, текущая оценка пользователя <span class="bg-white rounded-md px-1">{score}</span> баллов.'
                            },
                            rejected: {
                                first_party: 'Ваш ответ отклонен одним из подтверждающим.',
                                third_party: 'Ответ пользователя отклонен одним из подтверждающим.'
                            },
                            fix_require: {
                                first_party: 'Один из подтверждающих запросил исправления ответа, ваша текущая оценка <span class="bg-white rounded-md px-1">{score}</span> баллов.',
                                third_party: 'Один из подтверждающих запросил исправления ответа, текущая оценка пользователя <span class="bg-white rounded-md px-1">{score}</span> баллов.'
                            },
                            fixed_and_accepted: {
                                first_party: 'Вы заработали <span class="bg-white rounded-md px-1">{score}</span> баллов с учетом исправлений подтверждающего.',
                                third_party: 'Пользователь заработал <span class="bg-white rounded-md px-1">{score}</span> баллов с учетом исправлений подтверждающего.'
                            },
                            accepted: {
                                first_party: 'Вы заработали <span class="bg-white rounded-md px-1">{score}</span> баллов.',
                                third_party: 'Пользователь заработал <span class="bg-white rounded-md px-1">{score}</span> баллов.'
                            },
                            form: {
                                scoring: {
                                    disabled: 'На эту форму не назначена функция оценки',
                                    by_constant: 'Оценка присваивается в соответствии с предопределенным значением формы',
                                    by_math_expression: 'Баллы рассчитывается по формуле <span class="bg-white rounded-md px-1">{math_expression}</span>, где:'
                                }
                            }
                        }
                    }
                },
                verification: {
                    head: {
                        title: 'Проверка листа оценки'
                    },
                    header: 'Проверка листа оценки',
                    create: {
                        //
                    },
                    update: {
                        title: 'Проверка и подтверждение ответа',
                        description: 'Вам предаставлено доступ для проверки и подтверждения листа оценки сотрудника. Переходите по записям для подтверждения оценки.',
                        form: {
                            //
                        },
                        actions: {
                            makeOrChangeDecisionButton: 'Принять или изменить решение',
                            modal: {
                                title: 'Ваше решение',
                                content: {
                                    verification_status: 'Решение',
                                    message: 'Сопроводительное письмо'
                                },
                                footer: {
                                    cancelButton: 'Отмена',
                                    updateButton: 'Сохранить'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Лист оценки',
                        description: 'Заполните оценочный лист до окончания текущего срока рейтинга с материалами',
                        form: {
                            score: '{score} баллов'
                        }
                    },
                    partials: {
                        showVerifications: {
                            trigger: 'Список подтверждений'
                        },
                        showStatus: {
                            trigger: 'Ваше решение'
                        }
                    }
                },
                approvement: {
                    head: {
                        title: 'Проверка листа оценки'
                    },
                    header: 'Проверка листа оценки',
                    create: {
                        //
                    },
                    update: {
                        title: 'Проверка и подтверждение ответа',
                        description: 'Вам предаставлено доступ для проверки и подтверждения листа оценки сотрудника. Переходите по записям для подтверждения оценки.',
                        form: {
                            //
                        },
                        actions: {
                            makeOrChangeDecisionButton: 'Принять или изменить решение',
                            modal: {
                                title: 'Ваше решение',
                                content: {
                                    verification_status: 'Решение',
                                    message: 'Сопроводительное письмо'
                                },
                                footer: {
                                    cancelButton: 'Отмена',
                                    updateButton: 'Сохранить'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Лист оценки',
                        description: 'Утвердите оценочный лист до окончания текущего срока рейтинга с материалами',
                        form: {
                            score: '{score} баллов'
                        },
                        actions: {
                            updateButton: 'Утвердить заявки'
                        },
                        banner: [
                            'Невозможно утвердить заявки так как время утверждения заявок еще не началось',
                            'Невозможно утвердить заявки так как время утверждения заявок просрочилась',
                            'Заявки успешно утверждены'
                        ]
                    }
                }
            },
            forms: {
                form: {
                    head: {
                        title: 'Управление формами'
                    },
                    header: 'Управление формами',
                    create: {
                        title: 'Создать форму',
                        description: 'Введите название и описание формы',
                        form: {
                            name: 'Название',
                            description: 'Описание'
                        },
                        actions: {
                            createButton: 'Создать'
                        }
                    },
                    update: {
                        title: 'Обновить форму',
                        description: 'Обновите название и описание формы',
                        form: {
                            name: 'Название',
                            description: 'Описание'
                        },
                        actions: {
                            savedMessage: 'Сохранено.',
                            saveButton: 'Сохранить'
                        }
                    },
                    updateScoring: {
                        title: 'Оценка формы',
                        description: 'Обновите политику оценки формы',
                        form: {
                            scoring: 'Подсчет баллов',
                            score: 'Балл',
                            math_expression: 'Математическое выражение',
                            variables: 'Список переменных, которые можно использовать в математическом выражении. Примечание: Чтобы объявить новую переменную, посетите страницу обновления поля формы.'
                        },
                        actions: {
                            savedMessage: 'Сохранено.',
                            saveButton: 'Сохранить'
                        },
                        scoring: {
                            disabled: {
                                name: 'Отключено',
                                description: 'По умолчанию оценка для формы отключен.'
                            },
                            by_constant: {
                                name: 'По постоянному значению',
                                description: 'Рассчитать балл по предварительно введенному постоянному значению'
                            },
                            by_math_expression: {
                                name: 'По математическому выражению',
                                description: 'Рассчитать балл по математическому выражению'
                            }
                        }
                    },
                    delete: {
                        title: 'Удалить форму',
                        description: 'Удалить форму навсегда',
                        content: {
                            deleteInfo: 'После удаления формы все его ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой формы загрузите любые данные или информацию об этом поле, которые вы хотите сохранить.',
                            deleteButton: 'Удалить форму',
                            modal: {
                                title: 'Удалить форму',
                                content: 'Вы уверены, что хотите удалить форму? После удаления поля все его ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Формы',
                        description: 'Создание и управление формами',
                        actions: {
                            createButton: 'Добавить'
                        }
                    },
                },
                formField: {
                    head: {
                        title: 'Управление формами'
                    },
                    header: 'Управление формами',
                    create: {
                        title: 'Создание нового поля формы',
                        description: 'Введите метку, тип, правила проверки и другие параметры поля формы',
                        form: {
                            label: 'Метка',
                            type: 'Тип',
                            variable: 'Переменная',
                            validation_rules: 'Правила проверки'
                        },
                        actions: {
                            createButton: 'Создать'
                        }
                    },
                    update: {
                        title: 'Обновить поле формы',
                        description: 'Обновите метку, тип, правила проверки и другие параметры поля формы',
                        form: {
                            label: 'Метка',
                            type: 'Тип',
                            variable: 'Переменная',
                            validation_rules: 'Правила проверки'
                        },
                        actions: {
                            savedMessage: 'Сохранено.',
                            saveButton: 'Сохранить'
                        }
                    },
                    delete: {
                        title: 'Удалить поле формы',
                        description: 'Удалить поле формы навсегда',
                        content: {
                            deleteInfo: 'После удаления поля формы все его ресурсы и данные будут удалены без возможности восстановления. Перед удалением этого поля загрузите любые данные или информацию об этом поле, которые вы хотите сохранить.',
                            deleteButton: 'Удалить поле формы',
                            modal: {
                                title: 'Удалить поле формы',
                                content: 'Вы уверены, что хотите удалить это поле формы? После удаления поля все его ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Поля формы',
                        description: 'Создание и управление полями форм',
                        actions: {
                            createButton: 'Добавить'
                        }
                    },
                    type: {
                        number: {
                            name: 'Number',
                            description: 'Числовые данные'
                        },
                        text: {
                            name: 'Text',
                            description: 'Текстовые или строковые данные'
                        },
                        textarea: {
                            name: 'Textarea',
                            description: 'Объемный текст или абзац'
                        },
                        email: {
                            name: 'Email',
                            description: 'Адрес электронной почты'
                        },
                        url: {
                            name: 'Url',
                            description: 'Электронный адрес'
                        },
                        select: {
                            name: 'Select',
                            description: 'Выбрать из списка'
                        },
                        multiselect: {
                            name: 'Multiselect',
                            description: 'Множественный выбор из списка'
                        },
                        file: {
                            name: 'File',
                            description: 'Загрузка файла'
                        },
                        time: {
                            name: 'Time',
                            description: 'Время ч:м:с'
                        },
                        date: {
                            name: 'Date',
                            description: 'Дата год/месяц/день'
                        },
                        datetime: {
                            name: 'Datetime',
                            description: 'Дата и время год/месяц/день ч:м:с'
                        },
                        datetime_local: {
                            name: 'Datetime Local',
                            description: 'Дата и время с учетом часового пояса год/месяц/день ч:м:с ZZ'
                        },
                    },
                    scoring_policy: {
                        disabled: {
                            name: 'Отключено',
                            description: 'Оценка для этого поля отключена по умолчанию.'
                        },
                        default: {
                            name: 'По умолчанию',
                            description: 'Присвоить оценку по умолчанию'
                        },
                        field_type: {
                            name: 'По типу поля',
                            description: 'Назначить оценку по типу поля'
                        }
                    },
                    validation_rules: {
                        mimes: {
                            'doc': {
                                name: '.doc',
                                description: 'Microsoft Word 1993'
                            },
                            'docx': {
                                name: '.docx',
                                description: 'Microsoft Word 2007'
                            },
                            'rtf': {
                                name: '.rtf',
                                description: 'Rich Text Format'
                            },
                            'xls': {
                                name: '.xls',
                                description: 'Microsoft Excel 1993'
                            },
                            'xlsx': {
                                name: '.xlsx',
                                description: 'Microsoft Excel 2007'
                            },
                            'ppt': {
                                name: '.ppt',
                                description: 'Microsoft Power Point 1993'
                            },
                            'pptx': {
                                name: '.pptx',
                                description: 'Microsoft Power Point 2007'
                            },
                            'xml': {
                                name: '.xml',
                                description: 'eXtensible Markup Language'
                            },
                            'csv': {
                                name: '.csv',
                                description: 'Comma-Separated Values'
                            },
                            'pdf': {
                                name: '.pdf',
                                description: 'Portable Document Format'
                            },
                            'png': {
                                name: '.png',
                                description: 'Portable Network Graphics'
                            },
                            'jpg': {
                                name: '.jpg',
                                description: 'Joint Photographic Experts Group'
                            },
                            'jpeg': {
                                name: '.jpeg',
                                description: 'Joint Photographic Experts Group'
                            },
                            'gif': {
                                name: '.gif',
                                description: 'Graphics Interchange Format'
                            },
                            'mp3': {
                                name: '.mp3',
                                description: 'MPEG-1/2/2.5 Layer 3'
                            },
                            'wav': {
                                name: '.wav',
                                description: 'Waveform Audio File Format'
                            },
                            'wma': {
                                name: '.wma',
                                description: 'Windows Media Audio'
                            },
                            'aac': {
                                name: '.aac',
                                description: 'Advanced Audio Coding'
                            },
                            'mp4': {
                                name: '.mp4',
                                description: 'ISO Base Media File Format (MPEG-4 Part 12)'
                            },
                            'avi': {
                                name: '.avi',
                                description: 'Audio Video Interleave'
                            },
                            'mov': {
                                name: '.mov',
                                description: 'QuickTime multimedia file format; Metal oxide varistor'
                            }
                        }
                    }
                },
                formFieldOption: {
                    head: {
                        title: 'Создание и управление формами'
                    },
                    header: 'Создание и управление формами',
                    create: {
                        title: 'Создать вариант выбора',
                        description: 'Создать новый вариант выбора поля формы: введите название и описание',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            score: 'Балл'
                        }
                    },
                    update: {
                        title: 'Обновить вариант выбора',
                        description: 'Обновить вариант выбора поля формы: введите название и описание',
                        form: {
                            name: 'Название',
                            description: 'Описание',
                            score: 'Балл'
                        }
                    },
                    delete: {
                        title: 'Удалить вариант выбора',
                        description: 'Удалить вариант выбора поля формы',
                        content: {
                            deleteInfo: 'После удаления варианта выбора поля формы все его ресурсы и данные будут удалены без возможности восстановления. Перед удалением этого варианта выбора поля формы загрузите любые данные или информацию об этом поле, которые вы хотите сохранить.',
                            deleteButton: 'Удалить вариант выбора поля формы',
                            modal: {
                                title: 'Удалить вариант выбора поля формы',
                                content: 'Вы уверены, что хотите удалить этого варианта выбора поля формы? После удаления поля все его ресурсы и данные будут удалены без возможности восстановления.',
                                footer: {
                                    cancelButton: 'Отмена',
                                    deleteButton: 'Удалить'
                                }
                            }
                        }
                    },
                    list: {
                        title: 'Параметры поля формы',
                        description: 'Создание и управление вариантами выбора поля формы',
                        form: {
                            listInfo: 'Список созданных вариантов выбора поля формы.'
                        },
                        actions: {
                            createButton: 'Добавить вариант выбора поля формы'
                        }
                    }
                },
            },
            wizards: {
                submission: {
                    head: {
                        title: 'Отправка ответа'
                    },
                    header: 'Отправка ответа',
                    showTitle: {
                        title: 'Отправка ответа',
                        description: 'Выберите направление и параметр оценки, заполните форму. В конце отправки вам будет предаставлено информация об оценке данного ответа',
                    },
                    showSteps: {
                        trigger: 'Шаги выполнения',
                        step: 'Шаг {number}'
                    },
                    steps: {
                        selectParameterTargetStep: {
                            title: 'Выберите направление',
                            form: {
                                parameter_target: 'Направление'
                            },
                            actions: {
                                nextStepButton: 'Далее'
                            }
                        },
                        selectParameterStep: {
                            title: 'Выберите параметр оценки',
                            form: {
                                parameter: 'Параметр'
                            },
                            actions: {
                                nextStepButton: 'Далее'
                            }
                        },
                        formFillingStep: {
                            title: 'Заполните форму',
                            form: {
                                //
                            },
                            actions: {
                                saveButton: 'Сохранить'
                            }
                        }
                    }
                }
            },
            welcome: {
                head: {
                    title: 'Добро пожаловать'
                },
                organization: {
                    title: 'Организация'
                },
                statistics: {
                    title: 'Статистика',
                    description: 'Система собирает статистику на основании анализа результатов деятельности сотрудников. Настройка данного  модуля подробнее указано в руководстве пользователя.'
                },
                userManual: {
                    title: 'Руководство пользователя',
                    description: 'Оценка деятельности сотрудников организации осуществляется на основании анализа результатов их деятельности за период оценки в соответствии с перечнем оцениваемых параметров. Результаты оценки труда сотрудников оформляются в виде сводных таблиц «Листа оценки» и со всеми подтверждающими документами сдаются в комиссию. Подробнее перейдите по ссылке.'
                },
                aboutSystem: {
                    title: 'О системе',
                    description: 'Система определяет порядок, сроки и методику проведения оценки деятельности сотрудников организации и регулирует вопросы определения надбавок к должностному окладу штатного сотрудника.'
                }
            },
            userManual: {
                head: {
                    title: 'Руководство пользователя'
                }
            }
        },
        layouts: {
            authenticated: {
                triggers: {
                    administration: 'Администрирование',
                    management: 'Управление',
                    locale: 'Язык'
                },
                linkGroups: {
                    siteSettings: 'Настройки веб сайта',
                    manageEntities: 'Управление объектами',
                    manageRating: 'Управление конфигурациями оценивания',
                    notifications: 'Уведомления'
                },
                links: {
                    authentication: 'Аутентификация',
                    dashboard: 'Панель управления',
                    dashboardUser: 'Главная',
                    dashboardVerifier: 'Проверка',
                    dashboardApprover: 'Утверждение',
                    positions: 'Должности',
                    departments: 'Отделы',
                    users: 'Пользователи',
                    roles: 'Роли',
                    employements: 'Трудоустройство',
                    ratings: 'Оценивание',
                    parameters: 'Параметры',
                    verifiers: 'Подтверждающие',
                    profile: 'Профиль',
                    logout: 'Выйти',
                    locales: {
                        ru: 'Русский',
                        en: 'Англиский'
                    }
                }
            }
        },
        components: {
            banner: {
                resource: {
                    created: 'Запись успешно создано! <a class="underline" href="{href}">Перейти к записи</a>',
                    updated: 'Запись успешно обновлена!',
                    deleted: 'Запись успешно удалена!'
                }
            },
            fileInput: {
                uploadFileButton: 'Загрузить файл',
                downloadFileButton: 'Скачать файл',
                removeFileButton: 'Удалить файл',
                noFileChosenMessage: 'Файл не выбран',
                modal: {
                    title: 'Вы уверены, что хотите удалить этот файл?',
                    content: 'После удаления файл будет уничтожен без возможности восстановления.',
                    footer: {
                        cancelButton: 'Отмена',
                        deleteButton: 'Удалить'
                    }
                }
            },
            select: {
                selectTitle: 'Выбрать',
                multipleSelectTitle: 'Выбрать несколько',
                closeButton: 'Закрыть'
            }
        },
        generic: {
            updateButton: 'Обновить'
        }
    }
};

module.exports = {messages, datetimeFormats};
