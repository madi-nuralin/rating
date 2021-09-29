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
              lastname: 'Lastname'
            }
          },
          update: {
            title: 'Update User',
            description: 'The user\'s name and description information.',
            form: {
              name: 'User name',
              email: 'User email',
              firstname: 'Firstname',
              lastname: 'Lastname'
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
              validTo: 'Valid to date'
            }
          },
          update: {
            title: 'Update Assessment',
            description: 'The assessment\'s name and description information.',
            form: {
              name: 'Assessment name',
              description: 'Assessment description',
              validFrom: 'Valid from date',
              validTo: 'Valid to date'
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
      }
    },
    layouts: {
      authenticated: {
        triggers: {
          management: 'Management'
        },
        linkGroups: {
          manageEntities: 'Manage entitites'
        },
        links: {
          dashboard: 'Dashboard',
          positions: 'Positions',
          departments: 'Departments',
          users: 'Users',
          assessments: 'Assessments',
          profile: 'Profile',
          logout: 'Log out'
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
              lastname: 'Фамилия'
            }
          },
          update: {
            title: 'Обновить пользователя',
            description: 'Информация о названии и описании отеделении.',
            form: {
              name: 'Имя пользователя',
              email: 'Электронная почта пользователя',
              firstname: 'Имя',
              lastname: 'Фамилия'
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
              validTo: 'Доступно до периода'
            }
          },
          update: {
            title: 'Обновить экземпляр оценки персонала',
            description: 'Информация о названии и описании экземпляра оценки персонала.',
            form: {
              name: 'Название экземпляра оценки персонала',
              description: 'Описание экземпляра оценки персонала',
              validFrom: 'Доступно периода с',
              validTo: 'Доступно до периода'
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
      }
    },
    layouts: {
      authenticated: {
        triggers: {
          management: 'Управление'
        },
        linkGroups: {
          manageEntities: 'Управление объектами'
        },
        links: {
          dashboard: 'Панель управления',
          positions: 'Должности',
          departments: 'Отделения',
          users: 'Пользователи',
          assessments: 'Оценивание персонала',
          profile: 'Профиль',
          logout: 'Выйти'
        }
      }
    }
  }
};

module.exports = { messages };