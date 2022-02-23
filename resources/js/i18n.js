const datetimeFormats = {
  'en': {
    short: {
      year: 'numeric', month: 'short', day: 'numeric'
    },
    long: {
      year: 'numeric', month: 'short', day: 'numeric',
      weekday: 'short', hour: 'numeric', minute: 'numeric'
    }
  },
  'ru': {
    short: {
      year: 'numeric', month: 'short', day: 'numeric'
    },
    long: {
      year: 'numeric', month: 'short', day: 'numeric',
      weekday: 'short', hour: 'numeric', minute: 'numeric', hour12: true
    }
  }
};


var messages = {
  en: {
    pages: {
      administration: {
      },
      management: {
        positions: {
          head: {
            title: 'Positions management'
          },
          header: 'Positions management',
          create: {
            title: 'Create a new position',
            description: 'Create a new position to collaborate with others on projects.',
            form: {
              name: 'Position name',
              description: 'Position description'
            }
          },
          update: {
            title: 'Update Position',
            description: 'The position\'s name and description information.',
            form: {
              name: 'Position name',
              description: 'Position description'
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
            title: 'Positions list',
            description: 'The positions list which are registered.',
            form: {
              listInfo: 'The list of resources which are registered. Use link button to view and edit each item'
            },
            actions: {
              createButton: 'Create New'
            }
          }
        },
        departments: {
          head: {
            title: 'Departments management'
          },
          header: 'Departments management',
          create: {
            title: 'Create a new department',
            description: 'Create a new department to collaborate with others on projects.',
            form: {
              name: 'Department name',
              description: 'Department description'
            }
          },
          update: {
            title: 'Update Department',
            description: 'The department\'s name and description information.',
            form: {
              name: 'Department name',
              description: 'Department description',
              parent: 'Parent department',
              positions: 'Department positions'
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
            title: 'Departments list',
            description: 'The departments list which are registered.',
            form: {
              listInfo: 'The list of resources which are registered. Use link button to view and edit each item'
            },
            actions: {
              createButton: 'Create New'
            }
          }
        },
        users: {
          head: {
            title: 'Users management'
          },
          header: 'Users management',
          create: {
            title: 'Create a new user',
            description: 'Create a new user to collaborate with others on projects.',
            form: {
              name: 'User name',
              email: 'User email',
              firstname: 'Firstname',
              lastname: 'Lastname',
              employements: 'Employement Information'
            }
          },
          update: {
            title: 'Update User',
            description: 'The user\'s name and description information.',
            form: {
              name: 'User name',
              email: 'User email',
              firstname: 'Firstname',
              lastname: 'Lastname',
              employements: 'Employement Information'
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
            title: 'Users list',
            description: 'The users list which are registered.',
            form: {
              listInfo: 'The list of resources which are registered. Use link button to view and edit each item'
            },
            actions: {
              createButton: 'Create New'
            }
          }
        },
        employement: {
          head: {
            title: 'Employements management'
          },
          header: 'Employements management',
          create: {
            title: 'Create a new user employement information',
            description: 'Create a new employement to collaborate with others on projects.',
            form: {
              employement_type: 'Employement Type',
              department: 'Select Department',
              position: 'Select Position',
              department: 'Select User',
              appointed_at: 'Appointed at',
              terminated_at: 'Terminated at',
            }
          },
          update: {
            title: 'Update Employement Information',
            description: 'The user employement information details.',
            form: {
              employement_type: 'Employement Type',
              department: 'Department',
              position: 'Position',
              user: 'User',
              appointed_at: 'Appointed at',
              terminated_at: 'Terminated at',
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
            title: 'Users employement information',
            description: 'The employement list which are registered.',
            form: {
            },
            actions: {
              createButton: 'Create New'
            }
          }
        },
        rating: {
          head: {
            title: 'Rating management'
          },
          header: 'Rating management',
          create: {
            title: 'Create a new rating',
            description: 'Create a new rating to collaborate with others on projects.',
            form: {
              name: 'Rating name',
              description: 'Rating description',
              submission_begin_time_at: 'Submission starts from',
              submission_end_time_at: 'Submission finish date',
              verification_begin_time_at: 'Verification starts from',
              verification_end_time_at: 'Verification finish date',
              approvement_begin_time_at: 'Approvement starts from',
              approvement_end_time_at: 'Approvement finish date',
            }
          },
          update: {
            title: 'Update Rating',
            description: 'The rating\'s name and description information.',
            form: {
              name: 'Rating name',
              description: 'Rating description',
              employements: 'Select department positions for rating',
              employement: {
                option: { 
                  description: 'The position of {department} department'
                }
              },
              verifiers: 'Select verifiers for rating',
              verifier: {
                option: { 
                  description: ''
                }
              },
              parameters: 'Select rating parameters',
              parameter: {
                option: { 
                  description: ''
                }
              }
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
          }
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
        parameters: {
          head: {
            title: 'Parameters management'
          },
          header: 'Parameters management',
          create: {
            title: 'Create a new parameter',
            description: 'Create a new parameter to collaborate with others on projects.',
            form: {
              name: 'Name',
              description: 'Description',
              target: 'Target'
            }
          },
          update: {
            title: 'Update Parameter',
            description: 'The parameter\'s name and description information.',
            form: {
              name: 'Name',
              description: 'Description',
              target: 'Target'
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
            title: 'Parameters list',
            description: 'The parameters list which are registered.',
            form: {
              listInfo: 'The list of resources which are registered. Use link button to view and edit each item'
            },
            actions: {
              createButton: 'Create New'
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
          showDate: {
            trigger: 'Date',
            begins: 'Begins: ',
            finishes: 'Finishes: ',
            finished: 'Finished: ',
            submission: 'Completing the assessment sheet',
            verification: 'Assessment sheet verification'
          },
          showName: {
            trigger: 'Title'
          },
          showDescription: {
            trigger: 'Description'
          },
          showVerifiers: {
            trigger: 'List of Verifiers'
          }
        },
        user: {
          head: {
            title: 'My rating'
          },
          header: 'My rating',
          content: {
            title: 'List of ratings',
            statistics: {
              total: 'Total',
              submitting: 'Active',
              verifying: 'Verifying'
            }
          }
        },
        verifier: {
          head: {
            title: 'Verification'
          },
          header: 'Verification'
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
            }
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
              responceLink: 'View responce',
              scoreLink: 'Score',
              score: '{score} pts.'
            },
            actions: {
              createButton: 'Submit new responce',
              modal: {
                title: 'Submission is not available',
                content: [
                  'Submission is not available due to it is early to submit responces',
                  'Submission is not available due to submission time has expired',
                ],
                footer: {
                  closeButton: 'Close'
                }
              }
            }
          },
          partials: {
            showVerifications: {
              trigger: 'List of verifications'
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
            title: 'Entry Confirmation',
            description: 'You have been given access to review and approve the employee\'s evaluation sheet. Go through the records to confirm the assessment.',
            form: {
              //
            },
            actions: {
              modal: {
                title: 'Your decision',
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
            }
          },
          update: {
            title: 'Update the form',
            description: 'Update the name and description of the form',
            form: {
              name: 'Name',
              description: 'Description'
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
              createButton: 'Create a new form'
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
            form: {
              listInfo: 'The list of created form fields.'
            },
            actions: {
              createButton: 'Create a new form filed'
            }
          },
          type: {
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
          dashboardUser: 'My rating',
          dashboardVerifier: 'Verification',
          positions: 'Positions',
          departments: 'Departments',
          users: 'Users',
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
        noFileChosenMessage: 'No file chosen'
      }
    }
  },
  ru: {
    pages: {
      administration: {
      },
      management: {
        positions: {
          head: {
            title: 'Управление должностями'
          },
          header: 'Управление должностями',
          create: {
            title: 'Создать новую должность',
            description: 'Создайте новую должность, чтобы сотрудничать с другими над проектами.',
            form: {
              name: 'Название должности',
              description: 'Описание должности'
            }
          },
          update: {
            title: 'Обновить должность',
            description: 'Информация о названии и описании должности.',
            form: {
              name: 'Название должности',
              description: 'Описание должности'
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
            description: 'Список позиций, которые зарегистрированы.',
            form: {
              listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента'
            },
            actions: {
              createButton: 'Создайте новый'
            }
          }
        },
        departments: {
          head: {
            title: 'Управление отделами'
          },
          header: 'Управление отделами',
          create: {
            title: 'Создать новый отедел',
            description: 'Создайте новый отеделами, чтобы сотрудничать с другими над проектами.',
            form: {
              name: 'Название отдела',
              description: 'Описание отедела'
            }
          },
          update: {
            title: 'Обновить отдела',
            description: 'Информация о названии и описании отеделении.',
            form: {
              name: 'Название отдела',
              description: 'Описание отдела',
              parent: 'Родительский отдел',
              positions: 'Должности отдела'
            }
          },
          delete: {
            title: 'Удалить отдел',
            description: 'Удалить этот отдел навсегда.',
            content: {
              deleteInfo: 'После удаления отеделении все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой отеделении, пожалуйста, загрузите любые данные или информацию относительно этой отеделении, которые вы хотите сохранить.',
              deleteButton: 'Удалить отдел',
              modal: {
                title: 'Удалить отдел',
                content: 'Вы уверены, что хотите удалить этот отдел? После удаления отеделении все ее ресурсы и данные будут удалены без возможности восстановления.',
                footer: {
                  cancelButton: 'Отмена',
                  deleteButton: 'Удалить отдел'
                }
              }
            }
          },
          list: {
            title: 'Список отеделении',
            description: 'Список отеделении, которые зарегистрированы.',
            form: {
              listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента'
            },
            actions: {
              createButton: 'Создайте новый'
            }
          }
        },
        users: {
          head: {
            title: 'Управление пользователями'
          },
          header: 'Управление пользователями',
          create: {
            title: 'Добавить нового пользователя',
            description: 'Добавить нового пользователя, чтобы сотрудничать с другими над проектами.',
            form: {
              name: 'Имя пользователя',
              email: 'Электронная почта пользователя',
              firstname: 'Имя',
              lastname: 'Фамилия',
              employements: 'Информация о занятости'
            }
          },
          update: {
            title: 'Обновить пользователя',
            description: 'Информация о названии и описании отеделении.',
            form: {
              name: 'Имя пользователя',
              email: 'Электронная почта пользователя',
              firstname: 'Имя',
              lastname: 'Фамилия',
              employements: 'Информация о занятости'
            }
          },
          delete: {
            title: 'Удалить пользователя',
            description: 'Удалить эту пользователя навсегда.',
            content: {
              deleteInfo: 'После удаления отеделении все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой отеделении, пожалуйста, загрузите любые данные или информацию относительно этой отеделении, которые вы хотите сохранить.',
              deleteButton: 'Удалить пользователя',
              modal: {
                title: 'Удалить пользователя',
                content: 'Вы уверены, что хотите удалить эту пользователя? После удаления отеделении все ее ресурсы и данные будут удалены без возможности восстановления.',
                footer: {
                  cancelButton: 'Отмена',
                  deleteButton: 'Удалить пользователя'
                }
              }
            }
          },
          list: {
            title: 'Список пользователей',
            description: 'Список пользователей, которые зарегистрированы.',
            form: {
              listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента'
            },
            actions: {
              createButton: 'Создайте новый'
            }
          }
        },
        employement: {
          head: {
            title: 'Управление трудоустройством пользователей'
          },
          header: 'Управление трудоустройством пользователей',
          create: {
            title: 'Создать информацию о занятости пользователя',
            description: 'Создайте новую работу, чтобы сотрудничать с другими над проектами.',
            form: {
              employement_type: 'Вид трудоустройства',
              department: 'Выберите отдел',
              position: 'Выбрать позицию',
              department: 'Выбрать пользователя',
              appointed_at: 'Назначен в',
              terminated_at: 'Прекращено в',
            }
          },
          update: {
            title: 'Обновить информацию о занятости',
            description: 'Сведения о занятости пользователя.',
            form: {
              employement_type: 'Вид трудоустройства',
              department: 'Отдел',
              position: 'Позиция',
              user: 'Пользователь',
              appointed_at: 'Назначен в',
              terminated_at: 'Прекращено в',
            }
          },
          delete: {
            title: 'Обновить информацию о занятости',
            description: 'Удалить эту информацию о занятости без возможности восстановления.',
            content: {
              deleteInfo: 'После удаления информации о занятости все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой информации о занятости, пожалуйста, загрузите любые данные или информацию об этой должности, которые вы хотите сохранить.',
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
            title: 'Users employement information',
            description: 'The employement list which are registered.',
            form: {
            },
            actions: {
              createButton: 'Create New'
            }
          }
        },
        rating: {
          head: {
            title: 'Управление оценкой персонала'
          },
          header: 'Управление оценкой персонала',
          create: {
            title: 'Создать новую экземпляр оценки персонала',
            description: 'Создайте новую экземпляр оценки персонала, чтобы сотрудничать с другими над проектами.',
            form: {
              name: 'Название рейтинга',
              description: 'Описание рейтинга',
              submission_begin_time_at: 'Подача начинается с',
              submission_end_time_at: 'Дата окончания подачи',
              verification_begin_time_at: 'Проверка начинается с',
              verification_end_time_at: 'Дата окончания проверки',
              approvement_begin_time_at: 'Утверждение начинается с',
              approvement_end_time_at: 'Дата окончания утверждения',
            }
          },
          update: {
            title: 'Обновить экземпляр оценки персонала',
            description: 'Информация о названии и описании экземпляра оценки персонала.',
            form: {
              name: 'Название экземпляра оценки персонала',
              description: 'Описание экземпляра оценки персонала',
              validFrom: 'Доступно периода с',
              validTo: 'Доступно до периода',
              employements: 'Выберите должности отдела для оценки',
              employement: {
                option: {
                  description: 'Должность отдела: {department}'
                }
              },
              verifiers: 'Выберите сотрудников подтверждающие данное оценивание',
              verifier: {
                option: {}
              },
              parameters: 'Выберите параметры оценивания',
              parameter: {
                option: {}
              }
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
          }
        },
        verifier: {
          head: {
            title: 'Управление подтверждением рейтнга'
          },
          header: 'Управление подтверждением рейтнга',
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
            title: 'Подтверждающие',
            description: 'Зарегистрированные верификаторы этого рейтинга.',
            form: {
              //
            },
            actions: {
              createButton: 'Создать новое'
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
        parameters: {
          head: {
            title: 'Управление параметрами оценки'
          },
          header: 'Управление параметрами оценки',
          create: {
            title: 'Создать новую параметр оценки',
            description: 'Создайте новую параметр оценки, чтобы сотрудничать с другими над проектами.',
            form: {
              name: 'Название',
              description: 'Описание',
              target: 'Направление деятельности'
            }
          },
          update: {
            title: 'Обновить параметр оценки',
            description: 'Информация о названии и описании параметра оценки.',
            form: {
              name: 'Название',
              description: 'Описание',
              target: 'Направление деятельности'
            }
          },
          delete: {
            title: 'Удалить параметр оценки',
            description: 'Удалить эту параметр оценки навсегда.',
            content: {
              deleteInfo: 'После удаления параметров оценки все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой параметров оценки, пожалуйста, загрузите любые данные или информацию относительно этой параметров оценки, которые вы хотите сохранить.',
              deleteButton: 'Удалить параметр оценки',
              modal: {
                title: 'Удалить параметр оценки',
                content: 'Вы уверены, что хотите удалить эту параметр оценки? После удаления параметра оценки все ее ресурсы и данные будут удалены без возможности восстановления.',
                footer: {
                  cancelButton: 'Отмена',
                  deleteButton: 'Удалить параметр оценки'
                }
              }
            }
          },
          list: {
            title: 'Список параметров оценки',
            description: 'Список параметров оценки, которые зарегистрированы.',
            form: {
              listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента'
            },
            actions: {
              createButton: 'Создайте новый'
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
          showDate: {
            trigger: 'Дата',
            begins: 'Начинается: ',
            finishes: 'Завершается: ',
            finished: 'Завершено: ',
            submission: 'Заполнение листа оценки',
            verification: 'Подтверждение листа оценки'
          },
          showName: {
            trigger: 'Название'
          },
          showDescription: {
            trigger: 'Описание'
          },
          showVerifiers: {
            trigger: 'Список подтверждающих'
          }
        },
        user: {
          head: {
            title: 'Мой рейтинг'
          },
          header: 'Мой рейтинг',
          content: {
            title: 'Список рейтингов',
            statistics: {
              total: 'Всего',
              submitting: 'Активные',
              verifying: 'На проверке'
            }
          }
        },
        verifier: {
          head: {
            title: 'Подтверждение'
          },
          header: 'Подтверждение'
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
            title: 'Действие для оценки',
            description: 'Представление оценочного листа и его детали. Вам разрешено обновлять форму до тех пор, пока дата отправки не истечет.',
            form: {
              //
            }
          },
          delete: {
            title: 'Удалить действие',
            description: 'Навсегда удалить действие',
            content: {
              deleteInfo: 'После удаления представления все его ресурсы и данные будут безвозвратно удалены. Перед удалением этой отправки загрузите любые данные или информацию, касающиеся этого поля, которые вы хотите сохранить.',
              deleteButton: 'Удалить отправку',
              modal: {
                title: 'Удалить отправку',
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
              responceLink: 'Ответ',
              scoreLink: 'Баллы',
              score: '{score} баллов'
            },
            actions: {
              createButton: 'Отправить новый ответ',
              modal: {
                title: 'Отправка ответов невозможно',
                content: [
                  'Отправка ответов невозможноно, так как время для отправки ответов еще не началось',
                  'Отправка ответов невозможноно, так как время для отправки ответов просрочилась',
                ],
                footer: {
                  closeButton: 'Закрыть'
                }
              }
            }
          },
          partials: {
            showVerifications: {
              trigger: 'Список подтверждений'
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
            title: 'Подтверждение записи',
            description: 'Вам предаставлено доступ для проверки и подтверждения листа оценки сотрудника. Переходите по записям для подтверждения оценки.',
            form: {
              //
            },
            actions: {
              modal: {
                title: 'Ваше решение',
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
            }
          },
          update: {
            title: 'Обновить форму',
            description: 'Обновите название и описание формы',
            form: {
              name: 'Название',
              description: 'Описание'
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
            form: {
              listInfo: 'Список созданных полей формы.'
            },
            actions: {
              createButton: 'Создать новое поле формы'
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
            form: {
              listInfo: 'Список созданных полей формы.'
            },
            actions: {
              createButton: 'Создать новое поле формы'
            }
          },
          type: {
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
              createButton: 'Создать новое вариант выбора поля формы'
            }
          }
        },
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
          dashboardUser: 'Мой рейтинг',
          dashboardVerifier: 'Подтверждение',
          positions: 'Должности',
          departments: 'Отделы',
          users: 'Пользователи',
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
        noFileChosenMessage: 'Файл не выбран'
      }
    }
  }
};

module.exports = { messages, datetimeFormats };