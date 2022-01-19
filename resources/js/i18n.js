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
}

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
              filling_started_at: 'Submission starts from',
              filling_expired_at: 'Submission finish date',
              verification_started_at: 'Verification starts from',
              verification_expired_at: 'Verification finish date',
              approvement_started_at: 'Approvement starts from',
              approvement_expired_at: 'Approvement finish date',
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
              name: 'Parameter name',
              description: 'Parameter description',
              category: 'Parameter category',
              score: 'Score'
            }
          },
          update: {
            title: 'Update Parameter',
            description: 'The parameter\'s name and description information.',
            form: {
              name: 'Parameter name',
              description: 'Parameter description',
              category: 'Parameter category',
              score: 'Score'
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
        tabs: {
          assignments: 'My ratings',
          assignment: {
            description: 'An instance of rating is assigned by the system managers. Here you can add your performed activities for confirmation'
          },
          confirmations: 'Employees rating',
          confirmation: {
            description: 'Check and confirm the effective activity of employees. This role was assigned to you by the system manager'
          }
        },
        user: {
          employement: 'Your employement information',
          roles: 'Your roles'
        },
        description: 'A Staff Performance Rating (SPA) application provides an employee to see his overall ratings(self as well as supervisor\'s). SPA allows system managers\' to create and manage staff rating instances with configurable performance parameters.',
        empty: 'No items found',
        assignments: {
          head: {
            title: 'My ratings'
          },
          header: 'My ratings',
          list: {
            title: 'My assignments',
            description: 'The list of assignments',
            form: {
              listInfo: 'The list of resources which are registered. Use link button to view and edit each item'
            }
          },
          information: {
            title: 'General information',
            description: 'Position rating information',
            rating: 'Rating',
            user: 'User',
            date: 'Valid date',
            employement: {
              department: 'Department',
              position: 'Position'
            },
            score: 'Score'
          }
        },
        confirmations: {
          head: {
            title: 'Staff rating confirmation'
          },
          header: 'Staff rating confirmation',
          list: {
            title: 'Staff rating confirmation',
            description: 'The list of assignments for confirmation',
            form: {
              listInfo: 'The list of resources which are registered. Use link button to view and edit each item'
            }
          },
          information: {
            title: 'Confirmation of rating',
            description: 'List of committee members authorized to confirm this rating',
            status: {
              not_viewed: 'Not viewed',
              denied: 'Denied',
              confirmed: 'Confirmed'
            }
          },
          update: {
            title: 'Your decision',
            description: 'Decide whether to approve or reject the user\'s current rating',
            content: {
              info: 'После удаления действия все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой учетной записи загрузите любые данные или информацию об этой учетной записи, которые вы хотите сохранить.',
              status: {
                not_viewed: 'Not viewed',
                denied: 'Denied',
                confirmed: 'Confirmed'
              },
              changeDecisionButton: 'Change decision',
              denyButton: 'Deny',
              confirmButton: 'Confirm',
              modal: {
                title: {
                  deny: 'Deny',
                  confirm: 'Confirm'
                },
                content: {
                  deny: 'Are you sure to deny user\'s assignment?',
                  confirm: 'Are you sure to confirm user\'s assignment?'
                },
                footer: {
                  cancelButton: 'Cancel',
                  denyButton: 'Deny',
                  confirmButton: 'Confirm'
                }
              }
            }
          }
        },
        activities: {
          head: {
            title: 'Add new activity'
          },
          header: 'Add new activity',
          create: {
            title: 'Add new rating activity',
            description: 'Add new rating activity by selecting rating parameter',
            form: {
              parameter: 'Select rating parameter',
            },
            actions: {
              message: 'For this parameter you will receive {pts} points'
            }
          },
          update: {
            title: 'Update activity',
            description: 'Update rating activity details.',
            form: {
              parameter: 'Rating parameter',
              score: 'Amount of score which you received for this submission:'
            }
          },
          show: {
            title: 'User activity',
            description: 'Show rating activity details.',
            form: {
              parameter: 'Rating parameter',
              score: 'Amount of score which user earned for this activity:'
            }
          },
          list: {
            title: 'Activity list',
            description: 'The list of submitted activities.'
          },
          delete: {
            title: 'Delete activity',
            description: 'Permanently delete this activity.',
            content: {
              deleteInfo: 'After deleting an activity all its resources and data will be permanently deleted. Before deleting this activity, download any data or information about this account that you want to keep.',
              deleteButton: 'Delete activity',
              modal: {
                title: 'Delete activity',
                content: 'Are you sure you want to delete this rating activity? After deletion, all of its resources and data will be permanently deleted.',
                footer: {
                  cancelButton: 'Cancel',
                  deleteButton: 'Delete activity'
                }
              }
            }
          }
        }
      },
      forms: {
        form: {
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
              scoring_policy: 'Scoring Policy',
              score: 'Score',
              validation_rules: 'Validation Rules'
            }
          },
          update: {
            title: 'Update the form field',
            description: 'Update the label, type, validation rules, and other form field parameters',
            form: {
              label: 'Label',
              type: 'Type',
              scoring_policy: 'Scoring Policy',
              score: 'Score',
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
            title: 'Form management',
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
          scoring_policy: {
            disabled: {
              name: 'Disabled',
              description: 'Scoring is disabled for this field by default'
            },
            default: {
              name: 'Default',
              description: 'Assign default score'
            },
            field_type: {
              name: 'By Field Type',
              description: 'Assign score by field type'
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
          },
          options: {
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
              title: 'Update the form field option',
              description: 'Update the existing form field option',
              form: {
                name: 'Name',
                description: 'Description',
                score: 'Score'
              }
            },
            delete: {
              title: 'Delete the form field option',
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
          variables: {
            head: {
              title: 'Form management'
            },
            header: 'Form management',
            create: {
              title: 'Create a variable',
              description: 'Create a new form field variable by inserting name and description',
              form: {
                name: 'Name',
                description: 'Description'
              }
            },
            update: {
              title: 'Update the form field variable',
              description: 'Update the existing form field variable',
              form: {
                name: 'Name',
                description: 'Description'
              }
            },
            delete: {
              title: 'Delete the form field variable',
              description: 'Permanently delete the form field variable',
              content: {
                deleteInfo: 'Once a form field variable is deleted, all of its resources and data will be permanently deleted. Before deleting this field option, please download any data or information regarding this field option that you wish to retain.',
                deleteButton: 'Delete form field variable',
                modal: {
                  title: 'Delete a form field variable',
                  content: 'Are you sure you want to delete this form field variable? Once a field variable is deleted, all of its resources and data will be permanently deleted.',
                  footer: {
                    cancelButton: 'Cancel',
                    deleteButton: 'Delete'
                  }
                }
              }
            },
            list: {
              title: 'Form field variables',
              description: 'Create and manage form field variables',
              form: {
                listInfo: 'The list of created form field variables.'
              },
              actions: {
                createButton: 'Create a new form filed variable'
              }
            }
          }
        }
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
              filling_started_at: 'Подача начинается с',
              filling_expired_at: 'Дата окончания подачи',
              verification_started_at: 'Проверка начинается с',
              verification_expired_at: 'Дата окончания проверки',
              approvement_started_at: 'Утверждение начинается с',
              approvement_expired_at: 'Дата окончания утверждения',
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
            title: 'Список подтверждающих рейтинг лиц',
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
              name: 'Название параметра оценки',
              description: 'Описание параметра оценки',
              category: 'Выберите категорию параметра оценка',
              score: 'Количество баллов'
            }
          },
          update: {
            title: 'Обновить параметр оценки',
            description: 'Информация о названии и описании параметра оценки.',
            form: {
              name: 'Название параметра оценки',
              description: 'Описание параметра оценки',
              category: 'Выберите категорию параметра оценка',
              score: 'Количество баллов'
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
        tabs: {
          assignments: 'Мой рейтинг',
          assignment: {
            description: 'Экземпляр оценки назначается системными менеджерами. Здесь вы можете добавить свои выполненные действия для подтверждения'
          },
          confirmations: 'Рейтинг персонала',
          confirmation: {
            description: 'Проверяйте и выполните подтверждение эффективной деятельности сотрудников. Данная роль вам была присвоена менеджером системы'
          }
        },
        user: {
          employement: 'Информация о вашей занятости',
          roles: 'Ваши роли'
        },
        description: 'Приложение для оценки эффективности работы персонала (SPA), которое позволяет сотруднику видеть свои общие оценки (как собственные, так и руководителя). SPA позволяет системным менеджерам создавать экземпляры оценки персонала и управлять ими с настраиваемыми параметрами производительности.',
        empty: 'Не найдено элементов',
        assignments: {
          head: {
            title: 'Мой рейтинг'
          },
          header: 'Мой рейтинг',
          list: {
            title: 'Список оценивании назначенные мне',
            description: 'Список оценивании для расчета эффективной деятельности сотрудника',
            form: {
              listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента'
            }
          },
          information: {
            title: 'Информация о пользователе',
            description: 'Подробная информация о пользователе: отдел, должность',
            rating: 'Оценивание',
            user: 'Пользователь',
            date: 'Время действия текущего оцнивания',
            employement: {
              department: 'Отдел',
              position: 'Должность'
            },
            score: 'Текущий балл'
          }
        },
        confirmations: {
          head: {
            title: 'Подтверждение оценки деятельности пользователя'
          },
          header: 'Подтверждение оценки деятельности пользователя',
          list: {
            title: 'Список деятельности сотрудника для подтверждения',
            description: 'Список деятельности сотрудника для подтверждения. Подтвердите действия и заработанные баллы сотрудника за текущий период',
            form: {
              listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента'
            }
          },
          information: {
            title: 'Подтверждение текущего оценивания',
            description: 'Список сотрудников подтверждающие данное оценивание',
            status: {
              not_viewed: 'Не просмотрено',
              denied: 'Отказано',
              confirmed: 'Подтверждено'
            }
          },
          update: {
            title: 'Ваше решение',
            description: 'Примите решение подтвердить или отклонить текущее оценивание пользователя',
            content: {
              info: 'После удаления действия все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой учетной записи загрузите любые данные или информацию об этой учетной записи, которые вы хотите сохранить.',
              status: {
                not_viewed: 'Не просмотрено',
                denied: 'Отказано',
                confirmed: 'Подтверждено'
              },
              changeDecisionButton: 'Изменить решение',
              denyButton: 'Отказать',
              confirmButton: 'Подтвердить',
              modal: {
                title: {
                  deny: 'Отказать',
                  confirm: 'Подтвердить'
                },
                content: {
                  deny: 'Вы уверены, что отклоняете оценивание?',
                  confirm: 'Вы уверены, что подтверждаете правильность данного оценивания?'
                },
                footer: {
                  cancelButton: 'Отмена',
                  denyButton: 'Отказать',
                  confirmButton: 'Подтвердить'
                }
              }
            }
          }
        },
        activities: {
          head: {
            title: 'Мои действия'
          },
          header: 'Мои действия',
          create: {
            title: 'Добавить новое действи оценки',
            description: 'Добавить новое действи оценки. Выберите соответсвующий параметр и заполните форму',
            form: {
              parameter: 'Выберите параметр оценивания',
            },
          },
          update: {
            title: 'Обновить действие',
            description: 'Обновить действие.',
            form: {
              parameter: 'Выберите параметр оценивания',
              score: 'Количество баллов, которое вы заработали за текущее действие:'
            }
          },
          show: {
            title: 'Действие пользователя',
            description: 'Показать подробные сведения об оценке.',
            form: {
              parameter: 'Параметр оценки',
              score: 'Количество баллов, которые пользователь заработал за это действие:'
            }
          },
          list: {
            title: 'Список действий',
            description: 'Список представленных действии.'
          },
          delete: {
            title: 'Удалить действие',
            description: 'Удалить действие без возможности восстановления.',
            content: {
              deleteInfo: 'После удаления действия все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой учетной записи загрузите любые данные или информацию об этой учетной записи, которые вы хотите сохранить.',
              deleteButton: 'Удалить действие',
              modal: {
                title: 'Удалить действие',
                content: 'Вы уверены, что хотите удалить эту учетную запись? После удаления учетной записи все ее ресурсы и данные будут удалены без возможности восстановления.',
                footer: {
                  cancelButton: 'Отмена',
                  deleteButton: 'Удалить действие'
                }
              }
            }
          }
        }
      },
      forms: {
        form: {
        },
        formField: {
          head: {
            title: 'Создание и управление формами'
          },
          header: 'Создание и управление формами',
          create: {
            title: 'Создание нового поля формы',
            description: 'Введите метку, тип, правила проверки и другие параметры поля формы',
            form: {
              label: 'Метка',
              type: 'Тип',
              scoring_policy: 'Порядок подсчета баллов',
              score: 'Балл',
              validation_rules: 'Правила проверки'
            }
          },
          update: {
            title: 'Обновить поле формы',
            description: 'Обновите метку, тип, правила проверки и другие параметры поля формы',
            form: {
              label: 'Метка',
              type: 'Тип',
              scoring_policy: 'Порядок подсчета баллов',
              score: 'Балл',
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
            title: 'Управление формами',
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
          },
          options: {
            head: {
              title: 'Создание и управление формами'
            },
            header: 'Создание и управление формами',
            create: {
              title: 'Создать новый вариант выбора поля формы',
              description: 'Создать новый вариант выбора поля формы',
              form: {
                name: 'Название',
                description: 'Описание',
                score: 'Количество баллов'
              }
            },
            update: {
              title: 'Обновить вариант выбора поля формы',
              description: 'Обновить вариант выбора поля формы',
              form: {
                name: 'Название',
                description: 'Описание',
                score: 'Количество баллов'
              }
            },
            delete: {
              title: 'Удалить вариант выбора поля формы',
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
              title: 'Варианты выбора поля формы',
              description: 'Создание и управление вариантами выбора поля формы',
              form: {
                listInfo: 'Список созданных вариантов выбора поля формы.'
              },
              actions: {
                createButton: 'Создать новое вариант выбора поля формы'
              }
            }
          },
          variables: {
            head: {
              title: 'Создание и управление формами'
            },
            header: 'Создание и управление формами',
            create: {
              title: 'Создать новую переменную',
              description: 'Создать новую переменную формулы',
              form: {
                name: 'Название',
                description: 'Описание'
              }
            },
            update: {
              title: 'Обновить переменную формулы',
              description: 'Обновить переменную формулы поля формы',
              form: {
                name: 'Название',
                description: 'Описание'
              }
            },
            delete: {
              title: 'Удалить переменную формулы',
              description: 'Удалить переменную формулы поля формы',
              content: {
                deleteInfo: 'После удаления переменной все его ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой переменной загрузите любые данные или информацию об этом поле, которые вы хотите сохранить.',
                deleteButton: 'Удалить переменную формулы',
                modal: {
                  title: 'Удалить переменную формулы',
                  content: 'Вы уверены, что хотите удалить эпеременную формулы поля формы? После удаления поля все его ресурсы и данные будут удалены без возможности восстановления.',
                  footer: {
                    cancelButton: 'Отмена',
                    deleteButton: 'Удалить'
                  }
                }
              }
            },
            list: {
              title: 'Переменные формулы поля формы',
              description: 'Создание и управление переменными формулы поля формы',
              form: {
                listInfo: 'Список переменных формулы поля формы.'
              },
              actions: {
                createButton: 'Добавить'
              }
            }
          }
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
      }
    }
  }
};

module.exports = { messages, datetimeFormats };