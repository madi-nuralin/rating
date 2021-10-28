var messages = {
  en: {
    pages: {
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
              supervisors: 'Select supervisors for assessment',
              supervisor: {
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
              supervisors: 'Select supervisors for assessment',
              supervisor: {
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
              description: 'Parameter description'
            }
          },
          update: {
            title: 'Update Parameter',
            description: 'The parameter\'s name and description information.',
            form: {
              name: 'Parameter name',
              description: 'Parameter description'
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
          },
          rules: {
            head: {
              title: 'Parameter rules management'
            },
            header: 'Parameter rules management',
            create: {
              title: 'Create a new parameter rule',
              description: 'Create a new parameter rule to collaborate with others on projects.',
              form: {
                type: 'Rule type',
                name: 'Name',
                description: 'Description',
                input_id: 'Input identifier',
                input_type: 'Input field type',
                input_label: 'Input label',
                input_validation: 'Input validation rules',
                input_expression: 'Input computable expression',
                input_expression_type: 'Type of input expression'
              },
              type: {
                metadata: {
                  name: 'Metadata',
                  description: 'Metadata rule'
                },
                formula: {
                  name: 'Formula',
                  description: 'Formula rule'
                },
                submission: {
                  name: 'Submission',
                  description: 'Submission rules'
                }
              },
              input_type: {
                text: {
                  name: 'Text data',
                  description: 'Use to enter text data'
                },
                select: {
                  name: 'Select',
                  description: 'Use to select items from the list provided'
                },
                file: {
                  name: 'File',
                  description: 'Use to attach files'
                },
                link: {
                  name: 'Link',
                  description: 'Use to link to external resources'
                }
              },
              input_expression_type: {
                php: {
                  name: 'Php expression',
                  description: 'Use to use Php language expressions'
                }
              }
            },
            update: {
              title: 'Update Rule',
              description: 'The rule\'s name and description information.',
              form: {
                type: 'Rule type',
                name: 'Name',
                description: 'Description',
                input_id: 'Input identifier',
                input_type: 'Input field type',
                input_label: 'Input label',
                input_validation: 'Input validation rules',
                input_expression: 'Input computable expression',
                input_expression_type: 'Type of input expression'
              },
              type: {
                metadata: {
                  name: 'Metadata',
                  description: 'Metadata rule'
                },
                formula: {
                  name: 'Formula',
                  description: 'Formula rule'
                },
                submission: {
                  name: 'Submission',
                  description: 'Submission rules'
                }
              },
              input_type: {
                text: {
                  name: 'Text data',
                  description: 'Use to enter text data'
                },
                select: {
                  name: 'Select',
                  description: 'Use to select items from the list provided'
                },
                file: {
                  name: 'File',
                  description: 'Use to attach files'
                },
                link: {
                  name: 'Link',
                  description: 'Use to link to external resources'
                }
              },
              input_expression_type: {
                php: {
                  name: 'Php expression',
                  description: 'Use to use Php language expressions'
                }
              }
            },
            delete: {
              title: 'Delete Rule',
              description: 'Permanently delete this rule.',
              content: {
                deleteInfo: 'Once a rule is deleted, all of its resources and data will be permanently deleted. Before deleting this rule, please download any data or information regarding this parameter that you wish to retain.',
                deleteButton: 'Delete Rule',
                modal: {
                  title: 'Delete Rule',
                  content: 'Are you sure you want to delete this rule? Once a rule is deleted, all of its resources and data will be permanently deleted.',
                  footer: {
                    cancelButton: 'Cancel',
                    deleteButton: 'Delete Rule'
                  }
                }
              }
            },
            list: {
              title: 'Rules list',
              description: 'The rules list which are registered.',
              form: {
                listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента',
                type: 'Rule type',
                name: 'Name',
                description: 'Description',
                input_type: 'Input field type',
                input_validation: 'Validation rules',
                input_expression: 'Formula expression'
              },
              type: {
                metadata: {
                  name: 'Rule type: Metadata',
                  description: 'Metadata rule'
                },
                formula: {
                  name: 'Rule type: Formula',
                  description: 'Formula rule'
                },
                submission: {
                  name: 'Rule type: Submission',
                  description: 'Submission rules'
                }
              },
              actions: {
                createButton: 'Create New'
              }
            },
            options: {
              head: {
                title: 'Parameter rule management'
              },
              header: 'Parameter rule management',
              create: {
                title: 'Create a new option | Create a new variable',
                description: 'Create a new option | Create a new variable',
                form: {
                  name: 'Name',
                  description: 'Description'
                }
              },
              update: {
                title: 'Update option | Update variable',
                description: 'The option\'s name and description information. | The variable\'s name and description information.',
                form: {
                  name: 'Name',
                  description: 'Description'
                }
              },
              delete: {
                title: 'Delete option | Delete variable',
                description: 'Permanently delete this option. | Permanently delete this variable.',
                content: {
                  deleteInfo: 'Once a option is deleted, all of its resources and data will be permanently deleted. Before deleting this option, please download any data or information regarding this option that you wish to retain.' +
                    ' | Once a variable is deleted, all of its resources and data will be permanently deleted. Before deleting this variable, please download any data or information regarding this variable that you wish to retain.',
                  deleteButton: 'Delete option | Delete variable',
                  modal: {
                    title: 'Delete option | Delete variable',
                    content: 'Are you sure you want to delete this option? Once a option is deleted, all of its resources and data will be permanently deleted.' +
                      ' | Are you sure you want to delete this variable? Once a variable is deleted, all of its resources and data will be permanently deleted.',
                    footer: {
                      cancelButton: 'Cancel',
                      deleteButton: 'Delete option | Delete variable'
                    }
                  }
                }
              },
              list: {
                title: 'Option list | Variable list',
                description: 'The option list which are registered. | The variable list which are registered.',
                form: {
                  listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента',
                  name: 'Select option | Variable',
                  description: 'Description',
                },
                actions: {
                  createButton: 'Create New'
                }
              }
            }
          }
        }    
      },
      profile: {
        head: {
          title: 'Profile management'
        },
        header: 'Profile management',
        update: {
          title: 'Update Profile',
          description: 'The user\'s name and description information.',
          form: {
            name: 'Name',
            email: 'Email',
            firstname: 'Firstname',
            lastname: 'Lastname'
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
        assignments: {
          head: {
            title: 'Assignments'
          },
          header: 'Assignments',
          assignment_information: {
            title: 'General information',
            description: 'Position assessment information',
            valid_date: 'Valid date',
            employement: {
              department: 'Department',
              position: 'Position'
            },
            score: 'Score'
          },
          confirmation_information: {
            title: 'Confirmation of assessment',
            description: 'List of committee members authorized to confirm this assessment'
          }
        },
        confirmations: {
          head: {
            title: 'Assignments confirmation'
          },
          header: 'Assignments confirmation',
          assignment_information: {
            title: 'General information',
            description: 'Position assessment information',
            user: 'User',
            valid_date: 'Valid date',
            employement: {
              department: 'Department',
              position: 'Position'
            },
            score: 'Score'
          },
          confirmation_information: {
            title: 'Confirmation of assessment',
            description: 'List of committee members authorized to confirm this assessment'
          },
          update: {
            title: 'Your decision',
            description: 'Decide whether to approve or reject the user\'s current assessment'
          }
        },
        activities: {
          head: {
            title: 'Оценивание'
          },
          header: 'Оценивание',
          create: {
            title: 'Добавить новое действи оценки',
            description: 'Добавить новое действи оценки',
            form: {
              name: 'Название',
              description: 'Описание'
            }
          },
          update: {
            title: 'Обновить действие',
            description: 'Обновить действие.',
            form: {
              name: 'Имя пользователя',
              email: 'Эл. адрес',
              firstname: 'Имя',
              lastname: 'Фамилия'
            }
          },
          delete: {
            title: 'Удалить аккаунт',
            description: 'Удалить аккаунт без возможности восстановления.',
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
        }
      }
    },
    layouts: {
      authenticated: {
        triggers: {
          management: 'Management',
          locale: 'Language'
        },
        linkGroups: {
          manageEntities: 'Manage entitites',
          manageAssessment: 'Manage assignments'
        },
        links: {
          dashboard: 'Dashboard',
          positions: 'Positions',
          departments: 'Departments',
          users: 'Users',
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
    }
  },
  ru: {
    pages: {
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
            title: 'Управление отеделениями'
          },
          header: 'Управление отеделениями',
          create: {
            title: 'Создать новую отеделению',
            description: 'Создайте новую отеделению, чтобы сотрудничать с другими над проектами.',
            form: {
              name: 'Название отеделении',
              description: 'Описание отеделении'
            }
          },
          update: {
            title: 'Обновить отеделению',
            description: 'Информация о названии и описании отеделении.',
            form: {
              name: 'Название отеделении',
              description: 'Описание отеделении',
              parent: 'Родительский отдел',
              positions: 'Должности отделения'
            }
          },
          delete: {
            title: 'Удалить отеделению',
            description: 'Удалить эту отеделению навсегда.',
            content: {
              deleteInfo: 'После удаления отеделении все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой отеделении, пожалуйста, загрузите любые данные или информацию относительно этой отеделении, которые вы хотите сохранить.',
              deleteButton: 'Удалить отеделению',
              modal: {
                title: 'Удалить отеделению',
                content: 'Вы уверены, что хотите удалить эту отеделению? После удаления отеделении все ее ресурсы и данные будут удалены без возможности восстановления.',
                footer: {
                  cancelButton: 'Отмена',
                  deleteButton: 'Удалить отеделению'
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
              supervisors: 'Выберите контролеров для оценки',
              supervisor: {
                option: { 
                  description: ''
                }
              },
              parameters: 'Выберите параметры оценивания',
              parameter: {
                option: { 
                  description: ''
                }
              }
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
              supervisors: 'Выберите контролеров для оценки',
              supervisor: {
                option: { 
                  description: ''
                }
              },
              parameters: 'Выберите параметры оценивания',
              parameter: {
                option: { 
                  description: ''
                }
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
              description: 'Описание параметра оценки'
            }
          },
          update: {
            title: 'Обновить параметр оценки',
            description: 'Информация о названии и описании параметра оценки.',
            form: {
              name: 'Название параметра оценки',
              description: 'Описание параметра оценки'
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
          },
          rules: {
            head: {
              title: 'Управление правилами параметров оценки'
            },
            header: 'Управление правилами параметров оценки',
            create: {
              title: 'Создать новое правило параметра оценки',
              description: 'Создать новое правило параметра оценки, чтобы сотрудничать с другими над проектами.',
              form: {
                type: 'Тип правила',
                name: 'Название',
                description: 'Описание',
                input_id: 'Идентификатор поля заполнения',
                input_type: 'Тип поля заполнения',
                input_label: 'Метка поля заполнения',
                input_validation: 'Правила валидаций поля заполнения',
                input_expression: 'Вычисляемое выражение',
                input_expression_type: 'Тип вычисляемого выражения'
              },
              type: {
                metadata: {
                  name: 'Метаданные',
                  description: 'Правила метаданных'
                },
                formula: {
                  name: 'Формула',
                  description: 'Правила формулы'
                },
                submission: {
                  name: 'Отправка',
                  description: 'Правила для отправки файлов и ссылки'
                }
              },
              input_type: {
                text: {
                  name: 'Текстовые данные',
                  description: 'Используйте для ввода текстовых данных'
                },
                select: {
                  name: 'Выборка',
                  description: 'Используйте для выбора элементов из приведенного списка'
                },
                file: {
                  name: 'Файл',
                  description: 'Используйте для приклепления файлов'
                },
                link: {
                  name: 'Ссылка',
                  description: 'Используйте для ссылки на внешние ресурсы'
                }
              },
              input_expression_type: {
                php: {
                  name: 'Вычисляемое выражение на языке Php',
                  description: 'Используйте для вычисление формул и задач'
                }
              }
            },
            update: {
              title: 'Обновить правило параметра оценки',
              description: 'Информация о названии и описании правилы параметра оценки.',
              form: {
                type: 'Тип правила',
                name: 'Название',
                description: 'Описание',
                input_id: 'Идентификатор поля заполнения',
                input_type: 'Тип поля заполнения',
                input_label: 'Метка поля заполнения',
                input_validation: 'Правила валидаций поля заполнения',
                input_expression: 'Вычисляемое выражение',
                input_expression_type: 'Тип вычисляемого выражения'
              },
              type: {
                metadata: {
                  name: 'Метаданные',
                  description: 'Правила метаданных'
                },
                formula: {
                  name: 'Формула',
                  description: 'Правила формулы'
                },
                submission: {
                  name: 'Отправка',
                  description: 'Правила для отправки файлов и ссылки'
                }
              },
              input_type: {
                text: {
                  name: 'Текстовые данные',
                  description: 'Используйте для ввода текстовых данных'
                },
                select: {
                  name: 'Выборка',
                  description: 'Используйте для выбора элементов из приведенного списка'
                },
                file: {
                  name: 'Файл',
                  description: 'Используйте для приклепления файлов'
                },
                link: {
                  name: 'Ссылка',
                  description: 'Используйте для ссылки на внешние ресурсы'
                }
              },
              input_expression_type: {
                php: {
                  name: 'Вычисляемое выражение на языке Php',
                  description: 'Используйте для вычисление формул и задач'
                }
              }
            },
            delete: {
              title: 'Удалить правило параметра оценки',
              description: 'Удалить этот правило параметра оценки навсегда.',
              content: {
                deleteInfo: 'После удаления правила параметра оценки все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой параметров оценки, пожалуйста, загрузите любые данные или информацию относительно этой параметров оценки, которые вы хотите сохранить.',
                deleteButton: 'Удалить правило параметра оценки',
                modal: {
                  title: 'Удалить правило параметра оценки',
                  content: 'Вы уверены, что хотите удалить это правило параметра оценки? После удаления правила параметра оценки все ее ресурсы и данные будут удалены без возможности восстановления.',
                  footer: {
                    cancelButton: 'Отмена',
                    deleteButton: 'Удалить правило параметра оценки'
                  }
                }
              }
            },
            list: {
              title: 'Список правил параметра оценки',
              description: 'Список правил параметра оценки, которые зарегистрированы.',
              form: {
                listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента',
                type: 'Тип правила',
                name: 'Название',
                description: 'Описание',
                input_id: 'Идентификатор поля заполнения',
                input_type: 'Тип поля заполнения',
                input_label: 'Метка поля заполнения',
                input_validation: 'Правила валидаций поля заполнения',
                input_expression: 'Вычисляемое выражение',
                input_expression_type: 'Тип вычисляемого выражения'
              },
              type: {
                metadata: {
                  name: 'Тип правила: Метаданные',
                  description: 'Правила метаданных'
                },
                formula: {
                  name: 'Тип правила: Формула',
                  description: 'Правила формулы'
                },
                submission: {
                  name: 'Тип правила: Отправка',
                  description: 'Правила для отправки файлов и ссылки'
                }
              },
              actions: {
                createButton: 'Создайте новый'
              }
            },
            options: {
              head: {
                title: 'Управление правилами параметров'
              },
              header: 'Управление правилами параметров',
              create: {
                title: 'Создать новую опцию выбора | Создать новую переменную формулы',
                description: 'Создать новую опцию выбора | Создать новую переменную формулы',
                form: {
                  name: 'Название',
                  description: 'Описание'
                }
              },
              update: {
                title: 'Обновить опцию выбора | Обновить переменную формулы',
                description: 'Информация о названии и описании опции. | Информация об имени и описании переменной.',
                form: {
                  name: 'Название',
                  description: 'Описание'
                }
              },
              delete: {
                title: 'Удалить опцию выбора | Удалить переменную формулы',
                description: 'Удалить эту опцию навсегда. | Удалить эту переменную навсегда.',
                content: {
                  deleteInfo: 'После удаления опции все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой опции загрузите любые данные или информацию о ней, которые вы хотите сохранить.' +
                    ' | После удаления переменной все ее ресурсы и данные будут удалены без возможности восстановления. Перед удалением этой переменной загрузите любые данные или информацию об этой переменной, которые вы хотите сохранить.',
                  deleteButton: 'Удалить опцию выбора | Удалить переменную формулы',
                  modal: {
                    title: 'Удалить опцию выбора | Удалить переменную формулы',
                    content: 'Вы уверены, что хотите удалить эту опцию? После удаления опции все ее ресурсы и данные будут удалены без возможности восстановления.' +
                      ' | Вы уверены, что хотите удалить эту переменную? После удаления переменной все ее ресурсы и данные будут удалены без возможности восстановления.',
                    footer: {
                      cancelButton: 'Отмена',
                      deleteButton: 'Удалить опцию выбора | Удалить переменную формулы'
                    }
                  }
                }
              },
              list: {
                title: 'Список опции выбора | Список переменных формулы',
                description: 'Список опций, которые зарегистрированы. | Список переменных, которые зарегистрированы.',
                form: {
                  listInfo: 'Список ресурсов, которые зарегистрированы. Используйте кнопку ссылки для просмотра и редактирования каждого элемента',
                  name: 'Опция выбора | Переменная',
                  description: 'Описание',
                },
                actions: {
                  createButton: 'Создать новый'
                }
              }
            }
          }
        }
      },
      profile: {
        head: {
          title: 'Управление профилем'
        },
        header: 'Управление профилем',
        update: {
          title: 'Обновить профиль',
          description: 'Информация об имени и описании пользователя.',
          form: {
            name: 'Имя пользователя',
            email: 'Эл. адрес',
            firstname: 'Имя',
            lastname: 'Фамилия'
          }
        },
        delete: {
          title: 'Удалить аккаунт',
          description: 'Удалить аккаунт без возможности восстановления.',
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
        assignments: {
          head: {
            title: 'Оценивание'
          },
          header: 'Оценивание',
          assignment_information: {
            title: 'Информация о пользователе',
            description: 'Подробная информация о пользователе: отдел, должность',
            valid_date: 'Время действия текущего оцнивания',
            employement: {
              department: 'Отдел',
              position: 'Должность'
            },
            score: 'Текущий балл'
          },
          confirmation_information: {
            title: 'Подтверждение текущего оценивания',
            description: 'Список сотрудников подтверждающие данное оценивание'
          }
        },
        confirmations: {
          head: {
            title: 'Подтверждение оценки деятельности пользователя'
          },
          header: 'Подтверждение оценки деятельности пользователя',
          assignment_information: {
            title: 'Информация о пользователе',
            description: 'Подробная информация о пользователе: отдел, должность',
            user: 'Пользователь',
            valid_date: 'Время действия текущего оцнивания',
            employement: {
              department: 'Отдел',
              position: 'Должность'
            },
            score: 'Текущий балл'
          },
          confirmation_information: {
            title: 'Подтверждение текущего оценивания',
            description: 'Список сотрудников подтверждающие данное оценивание'
          },
          update: {
            title: 'Ваше решение',
            description: 'Примите решение подтвердить или отклонить текущее оценивание пользователя'
          }
        },
        activities: {
          head: {
            title: 'Оценивание'
          },
          header: 'Оценивание',
          create: {
            title: 'Добавить новое действи оценки',
            description: 'Добавить новое действи оценки',
            form: {
              name: 'Название',
              description: 'Описание'
            }
          },
          update: {
            title: 'Обновить действие',
            description: 'Обновить действие.',
            form: {
              name: 'Имя пользователя',
              email: 'Эл. адрес',
              firstname: 'Имя',
              lastname: 'Фамилия'
            }
          },
          delete: {
            title: 'Удалить аккаунт',
            description: 'Удалить аккаунт без возможности восстановления.',
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
        }
      }
    },
    layouts: {
      authenticated: {
        triggers: {
          management: 'Управление',
          locale: 'Язык'
        },
        linkGroups: {
          manageEntities: 'Управление объектами',
          manageAssessment: 'Управление конфигурациями оценивания',
        },
        links: {
          dashboard: 'Панель управления',
          positions: 'Должности',
          departments: 'Отделения',
          users: 'Пользователи',
          assessments: 'Настройка оценивания персонала',
          parameters: 'Настройка параметров оценивания',
          profile: 'Профиль',
          logout: 'Выйти',
          locales: {
            ru: 'Русский',
            en: 'Англиский'
          }
        }
      }
    }
  }
};

module.exports = { messages };