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
        assessments: {
          head: {
            title: 'Assessments management'
          },
          header: 'Assessments management',
          create: {
            title: 'Create a new assessment',
            description: 'Create a new assessment to collaborate with others on projects.',
            form: {
              name: 'Assessment name',
              description: 'Assessment description',
              validFrom: 'Valid from date',
              validTo: 'Valid to date',
              employements: 'Select department positions for assessment',
              employement: {
                option: { 
                  description: 'The position of {department} department'
                }
              },
              confirmers: 'Select confirmers for assessment',
              parameters: 'Select assessment parameters',
            }
          },
          update: {
            title: 'Update Assessment',
            description: 'The assessment\'s name and description information.',
            form: {
              name: 'Assessment name',
              description: 'Assessment description',
              validFrom: 'Valid from date',
              validTo: 'Valid to date',
              employements: 'Select department positions for assessment',
              employement: {
                option: { 
                  description: 'The position of {department} department'
                }
              },
              confirmers: 'Select confirmers for assessment',
              confirmer: {
                option: { 
                  description: ''
                }
              },
              parameters: 'Select assessment parameters',
              parameter: {
                option: { 
                  description: ''
                }
              }
            }
          },
          delete: {
            title: 'Delete Assessment',
            description: 'Permanently delete this assessment.',
            content: {
              deleteInfo: 'Once a assessment is deleted, all of its resources and data will be permanently deleted. Before deleting this assessment, please download any data or information regarding this assessment that you wish to retain.',
              deleteButton: 'Delete Assessment',
              modal: {
                title: 'Delete Assessment',
                content: 'Are you sure you want to delete this assessment? Once a assessment is deleted, all of its resources and data will be permanently deleted.',
                footer: {
                  cancelButton: 'Cancel',
                  deleteButton: 'Delete Assessment'
                }
              }
            }
          },
          list: {
            title: 'Assessments list',
            description: 'The assessments list which are registered.',
            form: {
              listInfo: 'The list of resources which are registered. Use link button to view and edit each item'
            },
            actions: {
              createButton: 'Create New'
            }
          }
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
            description: 'An instance of assessment is assigned by the system managers. Here you can add your performed activities for confirmation'
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
        description: 'A Staff Performance Assessment (SPA) application provides an employee to see his overall ratings(self as well as supervisor\'s). SPA allows system managers\' to create and manage staff assessment instances with configurable performance parameters.',
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
            description: 'Position assessment information',
            assessment: 'Assessment',
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
            title: 'Staff assessment confirmation'
          },
          header: 'Staff assessment confirmation',
          list: {
            title: 'Staff assessment confirmation',
            description: 'The list of assignments for confirmation',
            form: {
              listInfo: 'The list of resources which are registered. Use link button to view and edit each item'
            }
          },
          information: {
            title: 'Confirmation of assessment',
            description: 'List of committee members authorized to confirm this assessment',
            status: {
              not_viewed: 'Not viewed',
              denied: 'Denied',
              confirmed: 'Confirmed'
            }
          },
          update: {
            title: 'Your decision',
            description: 'Decide whether to approve or reject the user\'s current assessment',
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
            title: 'Add new assessment activity',
            description: 'Add new assessment activity by selecting assessment parameter',
            form: {
              parameter: 'Select assessment parameter',
            },
            actions: {
              message: 'For this parameter you will receive {pts} points'
            }
          },
          update: {
            title: 'Update activity',
            description: 'Update assessment activity details.',
            form: {
              parameter: 'Assessment parameter',
              score: 'Amount of score which you received for this submission:'
            }
          },
          show: {
            title: 'User activity',
            description: 'Show assessment activity details.',
            form: {
              parameter: 'Assessment parameter',
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
                content: 'Are you sure you want to delete this assessment activity? After deletion, all of its resources and data will be permanently deleted.',
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
        fields: {
          head: {
            title: 'Form management'
          },
          header: 'Form management',
          create: {
            title: 'Create a form',
            description: 'Create a new form field by inserting name and type',
            form: {
              name: 'Name',
              type: 'Field type',
              formula: 'Formula'
            }
          },
          update: {
            title: 'Update the form field',
            description: 'Update the existing form field',
            form: {
              name: 'Name',
              type: 'Field type',
              formula: 'Formula'
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
          types: {
            text: {
              name: 'Text or string data',
              description: 'Text or string data'
            },
            select: {
              name: 'Select from list',
              description: 'Select from the list'
            },
            multiselect: {
              name: 'Multiple selection from the list',
              description: 'Multiple selection from the list'
            },
            file: {
              name: 'Upload file',
              description: 'Upload file'
            },
            formula: {
              name: 'Formula',
              description: 'Formula input, a computable math expression'
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
          manageAssessment: 'Manage assignments',
          notifications: 'Notifications'
        },
        links: {
          authentication: 'Authentication',
          dashboard: 'Dashboard',
          positions: 'Positions',
          departments: 'Departments',
          users: 'Users',
          employements: 'Employements',
          assessments: 'Assessments',
          parameters: 'Parameters',
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
        assessments: {
          head: {
            title: 'Управление оценкой персонала'
          },
          header: 'Управление оценкой персонала',
          create: {
            title: 'Создать новую экземпляр оценки персонала',
            description: 'Создайте новую экземпляр оценки персонала, чтобы сотрудничать с другими над проектами.',
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
              confirmers: 'Выберите сотрудников подтверждающие данное оценивание',
              parameters: 'Выберите параметры оценивания',
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
              confirmers: 'Выберите сотрудников подтверждающие данное оценивание',
              confirmer: {
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
          assignments: 'Мои рейтинги',
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
            title: 'Мои рейтинги'
          },
          header: 'Мои рейтинги',
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
            assessment: 'Оценивание',
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
        fields: {
          head: {
            title: 'Создание и управление формами'
          },
          header: 'Создание и управление формами',
          create: {
            title: 'Создать поле формы',
            description: 'Создать новое поле формы',
            form: {
              name: 'Название',
              type: 'Выберите тип поля',
              formula: 'Введите формулу'
            }
          },
          update: {
            title: 'Обновить поле формы',
            description: 'Обновить поле формы',
            form: {
              name: 'Название',
              type: 'Выберите тип поля',
              formula: 'Формула'
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
          types: {
            text: {
              name: 'Текстовые или строковые данные',
              description: 'Текстовые или строковые данные'
            },
            select: {
              name: 'Выбрать из списка',
              description: 'Выбрать из списка'
            },
            multiselect: {
              name: 'Множественный выбор из списка',
              description: 'Множественный выбор из списка'
            },
            file: {
              name: 'Загрузка файла',
              description: 'Загрузка файла'
            },
            formula: {
              name: 'Формула',
              description: 'Ввод формулы, вычисляемое математическое выражение'
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
          manageAssessment: 'Управление конфигурациями оценивания',
          notifications: 'Уведомления'
        },
        links: {
          authentication: 'Аутентификация',
          dashboard: 'Панель управления',
          positions: 'Должности',
          departments: 'Отделы',
          users: 'Пользователи',
          employements: 'Трудоустройство',
          assessments: 'Оценивание',
          parameters: 'Параметры',
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