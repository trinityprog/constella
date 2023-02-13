const DATA = [
  {
    id: 1,
    type: 1,
    title: 'Мальчик',
    step2: {
      next: 3,
      prev: 1,
      icons: {
        g: '/assets/step2/1/icon_g.png',
        s: '/assets/step2/1/icon_s.svg',
      },
      image: '/assets/step2/1/image.png',
    },
    step3: {
      next: 4,
      prev: 2,
      images: {
        s: '/assets/step3/1/image_s.png',
        g: '/assets/step3/1/image_g.png',
      },
    },
    step4: {
      next: 5,
      prev: 3,
      data: [
        {
          id: 1,
          title: 'Без камней',
          icon: '/assets/step4/1/icon_1.svg',
          types: {
            s: {
              price: 445,
              image: '/assets/step4/1/image_1_s.png',
            },
            g: {
              price: 445,
              image: '/assets/step4/1/image_1_g.png',
            },
          },
        },
        {
          id: 2,
          title: 'Один камень в сердце',
          icon: '/assets/step4/1/icon_2.svg',
          types: {
            s: {
              price: 445,
              image: '/assets/step4/1/image_2_s.png',
            },
            g: {
              price: 445,
              image: '/assets/step4/1/image_2_g.png',
            },
          },
        },
        {
          id: 3,
          title: 'Полностью в камнях',
          icon: '/assets/step4/1/icon_3.svg',
          types: {
            s: {
              price: 695,
              image: '/assets/step4/1/image_3_s.png',
            },
            g: {
              price: 695,
              image: '/assets/step4/1/image_3_g.png',
            },
          },
        },
        {
          id: 777,
          title: 'В эмали',
          icon: '/assets/step4/1/icon_4.svg',
          types: {
            s: {
              price: 465,
              image: '/assets/step4/1/image_4_s.png',
            },
            g: {
              price: 465,
              image: '/assets/step4/1/image_4_g.png',
            },
          },
        },
      ],
    },
    step5: {
      next: 7,
      prev: 4,
      g: {
        tabs: [
          {
            id: 1,
            title: 'Бриллианты',
            items: [
              {
                id: 100,
                title: 'Белый бриллиант',
                icon: '/assets/step5/1/icon_100.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_100_g.png',
                    3: '/assets/step5/1/image_3_100_g.png',
                  },
              },
              {
                id: 200,
                title: 'Черный бриллиант',
                icon: '/assets/step5/1/icon_200.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_200_g.png',
                    3: '/assets/step5/1/image_3_200_g.png',
                  },
              },
            ],
          },
          {
            id: 3,
            title: 'Сапфиры',
            items: [
              {
                id: 400,
                title: 'Синий сапфир',
                icon: '/assets/step5/1/icon_400.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_400_g.png',
                    3: '/assets/step5/1/image_3_400_g.png',
                  },
              },
              {
                id: 500,
                title: 'Голубой сапфир',
                icon: '/assets/step5/1/icon_500.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_500_g.png',
                    3: '/assets/step5/1/image_3_500_g.png',
                  },
              },
              {
                id: 600,
                title: 'Оранжевый сапфир',
                icon: '/assets/step5/1/icon_600.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_600_g.png',
                    3: '/assets/step5/1/image_3_600_g.png',
                  },
              },
              {
                id: 700,
                title: 'Желтый сапфир',
                icon: '/assets/step5/1/icon_700.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_700_g.png',
                    3: '/assets/step5/1/image_3_700_g.png',
                  },
              },
            ],
          },
          {
            id: 4,
            title: 'Другие',
            items: [
              {
                id: 300,
                title: 'Красный рубин',
                icon: '/assets/step5/1/icon_300.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_300_g.png',
                    3: '/assets/step5/1/image_3_300_g.png',
                  },
              },
              {
                id: 800,
                title: 'Ярко-розовый рубин',
                icon: '/assets/step5/1/icon_800.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_800_g.png',
                    3: '/assets/step5/1/image_3_800_g.png',
                  },
              },
              {
                id: 900,
                title: 'Зеленый цаворит',
                icon: '/assets/step5/1/icon_900.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_900_g.png',
                    3: '/assets/step5/1/image_3_900_g.png',
                  },
              },
              // {
              //   id: 1000,
              //   title: 'Фиолетовый аметист',
              //   icon: '/assets/step5/1/icon_1000.png',
              //   images:
              //     {
              //       2: '/assets/step5/1/image_2_1000_g.png',
              //       3: '/assets/step5/1/image_3_1000_g.png',
              //     },
              // },
            ],
          },
        ],
      },
      s: {
        tabs: [
          {
            id: 1,
            title: 'Бриллианты',
            items: [
              {
                id: 100,
                title: 'Белый бриллиант',
                icon: '/assets/step5/1/icon_100.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_100_s.png',
                    3: '/assets/step5/1/image_3_100_s.png',
                  },
              },
              {
                id: 200,
                title: 'Черный бриллиант',
                icon: '/assets/step5/1/icon_200.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_200_s.png',
                    3: '/assets/step5/1/image_3_200_s.png',
                  },
              },
            ],
          },
          {
            id: 3,
            title: 'Сапфиры',
            items: [
              {
                id: 400,
                title: 'Синий сапфир',
                icon: '/assets/step5/1/icon_400.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_400_s.png',
                    3: '/assets/step5/1/image_3_400_s.png',
                  },
              },
              {
                id: 500,
                title: 'Голубой сапфир',
                icon: '/assets/step5/1/icon_500.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_500_s.png',
                    3: '/assets/step5/1/image_3_500_s.png',
                  },
              },
              {
                id: 600,
                title: 'Оранжевый сапфир',
                icon: '/assets/step5/1/icon_600.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_600_s.png',
                    3: '/assets/step5/1/image_3_600_s.png',
                  },
              },
              {
                id: 700,
                title: 'Желтый сапфир',
                icon: '/assets/step5/1/icon_700.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_700_s.png',
                    3: '/assets/step5/1/image_3_700_s.png',
                  },
              },
            ],
          },
          {
            id: 4,
            title: 'Другие',
            items: [
              {
                id: 300,
                title: 'Красный рубин',
                icon: '/assets/step5/1/icon_300.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_300_s.png',
                    3: '/assets/step5/1/image_3_300_s.png',
                  },
              },
              {
                id: 800,
                title: 'Ярко-розовый рубин',
                icon: '/assets/step5/1/icon_800.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_800_s.png',
                    3: '/assets/step5/1/image_3_800_s.png',
                  },
              },
              {
                id: 900,
                title: 'Зеленый цаворит',
                icon: '/assets/step5/1/icon_900.png',
                images:
                  {
                    2: '/assets/step5/1/image_2_900_s.png',
                    3: '/assets/step5/1/image_3_900_s.png',
                  },
              },
              // {
              //   id: 1000,
              //   title: 'Фиолетовый аметист',
              //   icon: '/assets/step5/1/icon_1000.png',
              //   images:
              //     {
              //       2: '/assets/step5/1/image_2_1000_s.png',
              //       3: '/assets/step5/1/image_3_1000_s.png',
              //     },
              // },
            ],
          },
        ],
      },
    },
    step51: {
      prev: 5,
      next: 62,
      g: {
        100: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/100/icon_100.svg'
          },
          {
            id: 200,
            name: 'Черный бриллиант',
            icon: '/assets/step5_1/1/100/icon_200.png'
          },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/100/icon_300.png'
          },
          {
            id: 400,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/100/icon_400.png'
          },
          {
            id: 500,
            name: 'Зеленый цаворит',
            icon: '/assets/step5_1/1/100/icon_500.png'
          },
          {
            id: 600,
            name: 'Оранжевый сапфир',
            icon: '/assets/step5_1/1/100/icon_600.png'
          },
          {
            id: 700,
            name: 'Синий сапфир',
            icon: '/assets/step5_1/1/100/icon_700.png'
          },
          {
            id: 800,
            name: 'Бледно розовый сапфир',
            icon: '/assets/step5_1/1/100/icon_800.png'
          },
          {
            id: 900,
            name: 'Голубой сапфир',
            icon: '/assets/step5_1/1/100/icon_900.png'
          },
          {
            id: 1000,
            name: 'Желтый сапфир',
            icon: '/assets/step5_1/1/100/icon_1000.png'
          },
          {
            id: 1100,
            name: 'Розовый сапфир',
            icon: '/assets/step5_1/1/100/icon_1100.png'
          },
          // {
          //   id: 1200,
          //   name: 'Фиолетовый аметист',
          //   icon: '/assets/step5_1/1/100/icon_1200.png'
          // },
        ],
        200: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/200/icon_100.svg'
          },
          // {
          //   id: 200,
          //   name: 'Белый бриллиант',
          //   icon: '/assets/step5_1/1/200/icon_200.png'
          // },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/200/icon_300.png'
          },
          {
            id: 400,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/200/icon_400.png'
          },
        ],
        400: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/400/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/400/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/400/icon_300.png'
          },
        ],
        500: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/500/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/500/icon_200.png'
          },
        ],
        600: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/600/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/600/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/600/icon_300.png'
          },
        ],
        700: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/700/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/700/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/700/icon_300.png'
          },
        ],
        900: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/900/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/900/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/900/icon_300.png'
          },
        ],
        1100: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/1100/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/1100/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/1100/icon_300.png'
          },
        ],
      },
      s: {
        100: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/100/icon_100.svg'
          },
          {
            id: 200,
            name: 'Черный бриллиант',
            icon: '/assets/step5_1/1/100/icon_200.png'
          },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/100/icon_300.png'
          },
          {
            id: 400,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/100/icon_400.png'
          },
          {
            id: 500,
            name: 'Зеленый цаворит',
            icon: '/assets/step5_1/1/100/icon_500.png'
          },
          {
            id: 600,
            name: 'Оранжевый сапфир',
            icon: '/assets/step5_1/1/100/icon_600.png'
          },
          {
            id: 700,
            name: 'Синий сапфир',
            icon: '/assets/step5_1/1/100/icon_700.png'
          },
        ],
        200: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/200/icon_100.svg'
          },
          // {
          //   id: 200,
          //   name: 'Белый бриллиант',
          //   icon: '/assets/step5_1/1/200/icon_200.png'
          // },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/200/icon_300.png'
          },
          {
            id: 400,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/200/icon_400.png'
          },
        ],
        400: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/400/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/400/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/400/icon_300.png'
          },
        ],
        500: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/500/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/500/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/500/icon_300.png'
          },
        ],
        600: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/600/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/600/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/600/icon_300.png'
          },
        ],
        700: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/700/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/700/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/700/icon_300.png'
          },
        ],
        900: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/900/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/900/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/900/icon_300.png'
          },
        ],
        1100: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/1/1100/icon_100.png'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/1/1100/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/1100/icon_300.png'
          },
        ],
      },
    },
    step6: {
      prev: 4,
      next: 62,
      g: [
        {
          id: 1,
          image: '/assets/step6_1/1/image_1_g.png',
          name: 'Белый',
          icon: '/assets/step6_1/1/icon.svg',
        },
        {
          id: 2,
          image: '/assets/step6_1/1/image_2_g.png',
          name: 'Синий',
          icon: '/assets/step6_1/1/icon.svg',
        },
        {
          id: 3,
          image: '/assets/step6_1/1/image_3_g.png',
          name: 'Красный',
          icon: '/assets/step6_1/1/icon.svg',
        },
        {
          id: 4,
          image: '/assets/step6_1/1/image_4_g.png',
          name: 'Желтый',
          icon: '/assets/step6_1/1/icon.svg',
        },
        {
          id: 5,
          image: '/assets/step6_1/1/image_5_g.png',
          name: 'Зеленый',
          icon: '/assets/step6_1/1/icon.svg',
        },
      ],
      s: [
        {
          id: 1,
          image: '/assets/step6_1/1/image_1_s.png',
          name: 'Белый',
          icon: '/assets/step6_1/1/icon.svg',
        },
        {
          id: 2,
          image: '/assets/step6_1/1/image_2_s.png',
          name: 'Синий',
          icon: '/assets/step6_1/1/icon.svg',
        },
        {
          id: 3,
          image: '/assets/step6_1/1/image_3_s.png',
          name: 'Красный',
          icon: '/assets/step6_1/1/icon.svg',
        },
        {
          id: 4,
          image: '/assets/step6_1/1/image_4_s.png',
          name: 'Желтый',
          icon: '/assets/step6_1/1/icon.svg',
        },
        {
          id: 5,
          image: '/assets/step6_1/1/image_5_s.png',
          name: 'Зеленый',
          icon: '/assets/step6_1/1/icon.svg',
        },
      ],
    },
    step62: {
      prev: 61,
      next: 7,
      g: {
        1: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_1_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_1_200_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_1_300_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/1/image_1_400_g.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/1/icon_400.png',
          },
        ],
        2: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_2_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_2_200_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_2_300_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/1/image_2_400_g.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/1/icon_400.png',
          },
        ],
        3: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_3_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_3_200_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_3_300_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          // {
          //   id: 450,
          //   image: '/assets/step6_2/1/image_3_450_g.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/1/icon_450.png',
          // },
          {
            id: 4,
            image: '/assets/step6_2/1/image_3_400_g.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/1/icon_400.png',
          },
        ],
        4: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_4_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_4_200_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_4_300_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          {
            id: 350,
            image: '/assets/step6_2/1/image_4_350_g.png',
            name: 'Желтый сапфир',
            icon: '/assets/step6_2/1/icon_350.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/1/image_4_400_g.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/1/icon_400.png',
          },
        ],
        5: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_5_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_5_200_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_5_300_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          {
            id: 370,
            image: '/assets/step6_2/1/image_5_370_g.png',
            name: 'Зеленый цаворит',
            icon: '/assets/step6_2/1/icon_370.png',
          },
          {
            id: 350,
            image: '/assets/step6_2/1/image_5_350_g.png',
            name: 'Желтый сапфир',
            icon: '/assets/step6_2/1/icon_350.png',
          },
        ],
      },
      s: {
        1: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_1_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_1_200_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_1_300_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/1/image_1_400_s.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/1/icon_400.png',
          },
        ],
        2: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_2_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_2_200_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_2_300_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/1/image_2_400_s.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/1/icon_400.png',
          },
        ],
        3: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_3_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_3_200_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_3_300_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          // {
          //   id: 450,
          //   image: '/assets/step6_2/1/image_3_450_s.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/1/icon_450.png',
          // },
          {
            id: 4,
            image: '/assets/step6_2/1/image_3_400_s.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/1/icon_400.png',
          },
        ],
        4: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_4_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_4_200_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_4_300_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          {
            id: 350,
            image: '/assets/step6_2/1/image_4_350_s.png',
            name: 'Желтый сапфир',
            icon: '/assets/step6_2/1/icon_350.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/1/image_4_400_s.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/1/icon_400.png',
          },
        ],
        5: [
          {
            id: 1,
            image: '/assets/step6_2/1/image_5_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/1/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/1/image_5_200_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/1/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/1/image_5_300_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/1/icon_300.png',
          },
          {
            id: 370,
            image: '/assets/step6_2/1/image_5_370_s.png',
            name: 'Зеленый цаворит',
            icon: '/assets/step6_2/1/icon_370.png',
          },
          {
            id: 350,
            image: '/assets/step6_2/1/image_5_350_s.png',
            name: 'Желтый сапфир',
            icon: '/assets/step6_2/1/icon_350.png',
          },
        ],
      },
    },
    step7: {
      prev: 5,
      next: 8,
    },
  },
  {
    id: 2,
    type: 2,
    title: 'Девочка',
    step2: {
      next: 3,
      prev: 1,
      icons: {
        g: '/assets/step2/2/icon_g.png',
        s: '/assets/step2/2/icon_s.svg',
      },
      image: '/assets/step2/2/image.png',
    },
    step3: {
      next: 4,
      prev: 2,
      images: {
        s: '/assets/step3/2/image_s.png',
        g: '/assets/step3/2/image_g.png',
      },
    },
    step4: {
      next: 5,
      prev: 3,
      data: [
        {
          id: 1,
          title: 'Без камней',
          icon: '/assets/step4/2/icon_1.svg',
          types: {
            s: {
              price: 445,
              image: '/assets/step4/2/image_1_s.png',
            },
            g: {
              price: 445,
              image: '/assets/step4/2/image_1_g.png',
            },
          },
        },
        {
          id: 2,
          title: 'Один камень в сердце',
          icon: '/assets/step4/2/icon_2.svg',
          types: {
            s: {
              price: 445,
              image: '/assets/step4/2/image_2_s.png',
            },
            g: {
              price: 445,
              image: '/assets/step4/2/image_2_g.png',
            },
          },
        },
        {
          id: 3,
          title: 'Хвостики в камнях',
          icon: '/assets/step4/2/icon_3.svg',
          types: {
            s: {
              price: 485,
              image: '/assets/step4/2/image_3_s.png',
            },
            g: {
              price: 485,
              image: '/assets/step4/2/image_3_g.png',
            },
          },
        },
        {
          id: 4,
          title: 'Полностью в камнях',
          icon: '/assets/step4/2/icon_4.svg',
          types: {
            s: {
              price: 695,
              image: '/assets/step4/2/image_4_s.png',
            },
            g: {
              price: 695,
              image: '/assets/step4/2/image_4_g.png',
            },
          },
        },
        {
          id: 777,
          title: 'В эмали',
          icon: '/assets/step4/2/icon_5.svg',
          types: {
            s: {
              price: 465,
              image: '/assets/step4/2/image_5_s.png',
            },
            g: {
              price: 465,
              image: '/assets/step4/2/image_5_g.png',
            },
          },
        },
      ],
    },
    step5: {
      next: 7,
      prev: 4,
      g: {
        tabs: [
          {
            id: 1,
            title: 'Бриллианты',
            items: [
              {
                id: 100,
                title: 'Белый бриллиант',
                icon: '/assets/step5/2/icon_100.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_100_g.png',
                    3: '/assets/step5/2/image_3_100_g.png',
                    4: '/assets/step5/2/image_4_100_g.png',
                  },
              },
              {
                id: 200,
                title: 'Черный бриллиант',
                icon: '/assets/step5/2/icon_200.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_200_g.png',
                    3: '/assets/step5/2/image_3_200_g.png',
                    4: '/assets/step5/2/image_4_200_g.png',
                  },
              },
            ],
          },
          {
            id: 3,
            title: 'Сапфиры',
            items: [
              {
                id: 400,
                title: 'Розовый сапфир',
                icon: '/assets/step5/2/icon_400.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_400_g.png',
                    3: '/assets/step5/2/image_3_400_g.png',
                    4: '/assets/step5/2/image_4_400_g.png',
                  },
              },
              {
                id: 500,
                title: 'Бледно розовый сапфир',
                icon: '/assets/step5/2/icon_500.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_500_g.png',
                    4: '/assets/step5/2/image_4_500_g.png',
                  },
              },
              {
                id: 600,
                title: 'Синий сапфир',
                icon: '/assets/step5/2/icon_600.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_600_g.png',
                    3: '/assets/step5/2/image_3_600_g.png',
                    4: '/assets/step5/2/image_4_600_g.png',
                  },
              },
              {
                id: 700,
                title: 'Голубой сапфир',
                icon: '/assets/step5/2/icon_700.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_700_g.png',
                    4: '/assets/step5/2/image_4_700_g.png',
                  },
              },
              {
                id: 800,
                title: 'Оранжевый сапфир',
                icon: '/assets/step5/2/icon_800.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_800_g.png',
                    4: '/assets/step5/2/image_4_800_g.png',
                  },
              },
              {
                id: 900,
                title: 'Желтый сапфир',
                icon: '/assets/step5/2/icon_900.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_900_g.png',
                    3: '/assets/step5/2/image_3_900_g.png',
                    4: '/assets/step5/2/image_4_900_g.png',
                  },
              },
            ],
          },
          {
            id: 4,
            title: 'Другие',
            items: [
              {
                id: 300,
                title: 'Красный рубин',
                icon: '/assets/step5/2/icon_300.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_300_g.png',
                    3: '/assets/step5/2/image_3_300_g.png',
                    4: '/assets/step5/2/image_4_300_g.png',
                  },
              },
              {
                id: 1000,
                title: 'Ярко-розовый рубин',
                icon: '/assets/step5/2/icon_1000.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_1000_g.png',
                    3: '/assets/step5/2/image_3_1000_g.png',
                    4: '/assets/step5/2/image_4_1000_g.png',
                  },
              },
              {
                id: 1100,
                title: 'Зеленый цаворит',
                icon: '/assets/step5/2/icon_1100.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_1100_g.png',
                    3: '/assets/step5/2/image_3_1100_g.png',
                    4: '/assets/step5/2/image_4_1100_g.png',
                  },
              },
              // {
              //   id: 1200,
              //   title: 'Фиолетовый аметист',
              //   icon: '/assets/step5/2/icon_1200.png',
              //   images:
              //     {
              //       2: '/assets/step5/2/image_2_1200_g.png',
              //       3: '/assets/step5/2/image_3_1200_g.png',
              //       4: '/assets/step5/2/image_4_1200_g.png',
              //     },
              // },
            ],
          },
        ],
      },
      s: {
        tabs: [
          {
            id: 1,
            title: 'Бриллианты',
            items: [
              {
                id: 100,
                title: 'Белый бриллиант',
                icon: '/assets/step5/2/icon_100.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_100_s.png',
                    3: '/assets/step5/2/image_3_100_s.png',
                    4: '/assets/step5/2/image_4_100_s.png',
                  },
              },
              {
                id: 200,
                title: 'Черный бриллиант',
                icon: '/assets/step5/2/icon_200.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_200_s.png',
                    3: '/assets/step5/2/image_3_200_s.png',
                    4: '/assets/step5/2/image_4_200_s.png',
                  },
              },
            ],
          },
          {
            id: 3,
            title: 'Сапфиры',
            items: [
              {
                id: 400,
                title: 'Розовый сапфир',
                icon: '/assets/step5/2/icon_400.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_400_s.png',
                    3: '/assets/step5/2/image_3_400_s.png',
                    4: '/assets/step5/2/image_4_400_s.png',
                  },
              },
              {
                id: 500,
                title: 'Бледно розовый сапфир',
                icon: '/assets/step5/2/icon_500.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_500_s.png',
                    4: '/assets/step5/2/image_4_500_s.png',
                  },
              },
              {
                id: 600,
                title: 'Синий сапфир',
                icon: '/assets/step5/2/icon_600.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_600_s.png',
                    3: '/assets/step5/2/image_3_600_s.png',
                    4: '/assets/step5/2/image_4_600_s.png',
                  },
              },
              {
                id: 700,
                title: 'Голубой сапфир',
                icon: '/assets/step5/2/icon_700.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_700_s.png',
                    4: '/assets/step5/2/image_4_700_s.png',
                  },
              },
              {
                id: 800,
                title: 'Оранжевый сапфир',
                icon: '/assets/step5/2/icon_800.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_800_s.png',
                    4: '/assets/step5/2/image_4_800_s.png',
                  },
              },
              {
                id: 900,
                title: 'Желтый сапфир',
                icon: '/assets/step5/2/icon_900.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_900_s.png',
                    3: '/assets/step5/2/image_3_900_s.png',
                    4: '/assets/step5/2/image_4_900_s.png',
                  },
              },
            ],
          },
          {
            id: 4,
            title: 'Другие',
            items: [
              {
                id: 300,
                title: 'Красный рубин',
                icon: '/assets/step5/2/icon_300.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_300_s.png',
                    3: '/assets/step5/2/image_3_300_s.png',
                    4: '/assets/step5/2/image_4_300_s.png',
                  },
              },
              {
                id: 1000,
                title: 'Ярко-розовый рубин',
                icon: '/assets/step5/2/icon_1000.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_1000_s.png',
                    3: '/assets/step5/2/image_3_1000_s.png',
                    4: '/assets/step5/2/image_4_1000_s.png',
                  },
              },
              {
                id: 1100,
                title: 'Зеленый цаворит',
                icon: '/assets/step5/2/icon_1100.png',
                images:
                  {
                    2: '/assets/step5/2/image_2_1100_s.png',
                    3: '/assets/step5/2/image_3_1100_s.png',
                    4: '/assets/step5/2/image_4_1100_s.png',
                  },
              },
              // {
              //   id: 1200,
              //   title: 'Фиолетовый аметист',
              //   icon: '/assets/step5/2/icon_1200.png',
              //   images:
              //     {
              //       2: '/assets/step5/2/image_2_1200_s.png',
              //       3: '/assets/step5/2/image_3_1200_s.png',
              //       4: '/assets/step5/2/image_4_1200_s.png',
              //     },
              // },
            ],
          },
        ],
      },
    },
    step51: {
      prev: 5,
      next: 62,
      g: {
        100: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/100/icon_100.svg'
          },
          {
            id: 200,
            name: 'Черный бриллиант',
            icon: '/assets/step5_1/2/100/icon_200.png'
          },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/100/icon_300.png'
          },
          {
            id: 400,
            name: 'Красный рубин',
            icon: '/assets/step5_1/2/100/icon_400.png'
          },
          {
            id: 500,
            name: 'Зеленый цаворит',
            icon: '/assets/step5_1/2/100/icon_500.png'
          },
          {
            id: 600,
            name: 'Оранжевый сапфир',
            icon: '/assets/step5_1/2/100/icon_600.png'
          },
          {
            id: 700,
            name: 'Синий сапфир',
            icon: '/assets/step5_1/2/100/icon_700.png'
          },
        ],
        200: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/200/icon_100.svg'
          },
          // {
          //   id: 200,
          //   name: 'Белый бриллиант',
          //   icon: '/assets/step5_1/2/200/icon_200.png'
          // },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/200/icon_300.png'
          },
          {
            id: 400,
            name: 'Красный рубин',
            icon: '/assets/step5_1/1/200/icon_400.png'
          },
        ],
        400: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/400/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/400/icon_200.png'
          },
        ],
        500: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/500/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/500/icon_200.png'
          },
        ],
        600: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/600/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/600/icon_200.png'
          },
        ],
        700: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/700/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/700/icon_200.png'
          },
        ],
        800: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/800/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/800/icon_200.png'
          },
        ],
        900: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/900/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/900/icon_200.png'
          },
        ],
        1100: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/1100/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/1100/icon_200.png'
          },
        ],
      },
      s: {
        100: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/100/icon_100.svg'
          },
          {
            id: 200,
            name: 'Черный бриллиант',
            icon: '/assets/step5_1/2/100/icon_200.png'
          },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/100/icon_300.png'
          },
          {
            id: 400,
            name: 'Красный рубин',
            icon: '/assets/step5_1/2/100/icon_400.png'
          },
          {
            id: 500,
            name: 'Зеленый цаворит',
            icon: '/assets/step5_1/2/100/icon_500.png'
          },
          {
            id: 700,
            name: 'Синий сапфир',
            icon: '/assets/step5_1/2/100/icon_700.png'
          },
        ],
        200: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/200/icon_100.svg'
          },
          // {
          //   id: 200,
          //   name: 'Белый бриллиант',
          //   icon: '/assets/step5_1/2/200/icon_200.png'
          // },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/200/icon_300.png'
          },
          {
            id: 400,
            name: 'Красный рубин',
            icon: '/assets/step5_1/2/200/icon_400.png'
          },
        ],
        500: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/500/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/500/icon_200.png'
          },
        ],
        600: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/600/icon_100.svg'
          },
          // {
          //   id: 400,
          //   name: 'Белый бриллиант',
          //   icon: '/assets/step5_1/2/600/icon_400.png'
          // },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/600/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/2/600/icon_300.png'
          },
        ],
        700: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/700/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/700/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/2/700/icon_300.png'
          },
        ],
        900: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/900/icon_100.svg'
          },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/900/icon_200.png'
          },
          {
            id: 300,
            name: 'Красный рубин',
            icon: '/assets/step5_1/2/900/icon_300.png'
          },
        ],
        1100: [
          {
            id: 100,
            name: 'Не выделять',
            icon: '/assets/step5_1/2/1100/icon_100.svg'
          },
          // {
          //   id: 300,
          //   name: 'Белый бриллиант',
          //   icon: '/assets/step5_1/2/1100/icon_300.png'
          // },
          {
            id: 200,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_1/2/1100/icon_200.png'
          },
          {
            id: 400,
            name: 'Красный рубин',
            icon: '/assets/step5_1/2/1100/icon_400.png'
          },
        ],
      },
    },
    step52: {
      prev: 5,
      next: 62,
      g: {
        100: [
          {
            id: 100,
            name: 'Белый бриллиант',
            icon: '/assets/step5_2/g/100/icon_100.png'
          },
          {
            id: 200,
            name: 'Черный бриллиант',
            icon: '/assets/step5_2/g/100/icon_200.png'
          },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_2/g/100/icon_300.png'
          },
          {
            id: 400,
            name: 'Синий сапфир',
            icon: '/assets/step5_2/g/100/icon_400.png'
          },
        ],
        200: [
          {
            id: 100,
            name: 'Черный бриллиант',
            icon: '/assets/step5_2/g/200/icon_100.png'
          },
          {
            id: 200,
            name: 'Белый бриллиант',
            icon: '/assets/step5_2/g/200/icon_200.png'
          },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_2/g/200/icon_300.png'
          },
        ],
        300: [
          {
            id: 100,
            name: 'Красный рубин',
            icon: '/assets/step5_2/g/300/icon_100.png'
          },
          {
            id: 200,
            name: 'Черный бриллиант',
            icon: '/assets/step5_2/g/300/icon_200.png'
          },
        ],
        900: [
          {
            id: 100,
            name: 'Желтый сапфир',
            icon: '/assets/step5_2/g/900/icon_100.png'
          },
          {
            id: 200,
            name: 'Красный рубин',
            icon: '/assets/step5_2/g/900/icon_200.png'
          },
          {
            id: 300,
            name: 'Белый бриллиант',
            icon: '/assets/step5_2/g/900/icon_300.png'
          },
          {
            id: 400,
            name: 'Черный бриллиант',
            icon: '/assets/step5_2/g/900/icon_400.png'
          },
          {
            id: 500,
            name: 'Синий сапфир',
            icon: '/assets/step5_2/g/900/icon_500.png'
          },
        ],
        1100: [
          {
            id: 100,
            name: 'Зеленый цаворит',
            icon: '/assets/step5_2/g/1100/icon_100.png'
          },
          {
            id: 200,
            name: 'Красный рубин',
            icon: '/assets/step5_2/g/1100/icon_200.png'
          },
        ],
      },
      s: {
        100: [
          {
            id: 100,
            name: 'Белый бриллиант',
            icon: '/assets/step5_2/s/100/icon_100.png'
          },
          {
            id: 200,
            name: 'Черный бриллиант',
            icon: '/assets/step5_2/s/100/icon_200.png'
          },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_2/s/100/icon_300.png'
          },
          {
            id: 400,
            name: 'Синий сапфир',
            icon: '/assets/step5_2/s/100/icon_400.png'
          },
          {
            id: 500,
            name: 'Зеленый цаворит',
            icon: '/assets/step5_2/s/100/icon_500.png'
          },
          {
            id: 600,
            name: 'Красный рубин',
            icon: '/assets/step5_2/s/100/icon_600.png'
          },
          // {
          //   id: 700,
          //   name: 'Фиолетовый аметист',
          //   icon: '/assets/step5_2/s/100/icon_700.png'
          // },
        ],
        200: [
          {
            id: 100,
            name: 'Черный бриллиант',
            icon: '/assets/step5_2/s/200/icon_100.png'
          },
          {
            id: 200,
            name: 'Белый бриллиант',
            icon: '/assets/step5_2/s/200/icon_200.png'
          },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_2/s/200/icon_300.png'
          },
        ],
        300: [
          {
            id: 100,
            name: 'Красный рубин',
            icon: '/assets/step5_2/s/300/icon_100.png'
          },
          {
            id: 200,
            name: 'Белый бриллиант',
            icon: '/assets/step5_2/s/300/icon_200.png'
          },
          {
            id: 300,
            name: 'Черный бриллиант',
            icon: '/assets/step5_2/s/300/icon_300.png'
          },
        ],
        600: [
          {
            id: 100,
            name: 'Синий сапфир',
            icon: '/assets/step5_2/s/600/icon_100.png'
          },
          {
            id: 200,
            name: 'Белый бриллиант',
            icon: '/assets/step5_2/s/600/icon_200.png'
          },
          {
            id: 300,
            name: 'Ярко-розовый рубин',
            icon: '/assets/step5_2/s/600/icon_300.png'
          },
        ],
      },
    },
    step6: {
      prev: 4,
      next: 62,
      g: [
        {
          id: 1,
          image: '/assets/step6_1/2/image_1_g.png',
          name: 'Белый',
          icon: '/assets/step6_1/2/icon.svg',
        },
        {
          id: 2,
          image: '/assets/step6_1/2/image_2_g.png',
          name: 'Розовый',
          icon: '/assets/step6_1/2/icon.svg',
        },
        {
          id: 3,
          image: '/assets/step6_1/2/image_3_g.png',
          name: 'Синий',
          icon: '/assets/step6_1/2/icon.svg',
        },
        {
          id: 4,
          image: '/assets/step6_1/2/image_4_g.png',
          name: 'Красный',
          icon: '/assets/step6_1/2/icon.svg',
        },
        {
          id: 5,
          image: '/assets/step6_1/2/image_5_g.png',
          name: 'Зеленый',
          icon: '/assets/step6_1/2/icon.svg',
        },
      ],
      s: [
        {
          id: 1,
          image: '/assets/step6_1/2/image_1_s.png',
          name: 'Белый',
          icon: '/assets/step6_1/2/icon.svg',
        },
        {
          id: 2,
          image: '/assets/step6_1/2/image_2_s.png',
          name: 'Розовый',
          icon: '/assets/step6_1/2/icon.svg',
        },
        {
          id: 3,
          image: '/assets/step6_1/2/image_3_s.png',
          name: 'Синий',
          icon: '/assets/step6_1/2/icon.svg',
        },
        {
          id: 4,
          image: '/assets/step6_1/2/image_4_s.png',
          name: 'Красный',
          icon: '/assets/step6_1/2/icon.svg',
        },
        {
          id: 5,
          image: '/assets/step6_1/2/image_5_s.png',
          name: 'Зеленый',
          icon: '/assets/step6_1/2/icon.svg',
        },
      ],
    },
    step62: {
      prev: 61,
      next: 7,
      g: {
        1: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_1_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_1_200_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/2/image_1_300_g.png',
            name: 'Черный бриллиант',
            icon: '/assets/step6_2/2/icon_300.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_1_400_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          {
            id: 5,
            image: '/assets/step6_2/2/image_1_500_g.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/2/icon_500.png',
          },
          // {
          //   id: 6,
          //   image: '/assets/step6_2/2/image_1_600_g.png',
          //   name: 'Фиолетовый аметист',
          //   icon: '/assets/step6_2/2/icon_600.png',
          // },
          {
            id: 7,
            image: '/assets/step6_2/2/image_1_700_g.png',
            name: 'Розовый сапфир',
            icon: '/assets/step6_2/2/icon_700.png',
          },
          {
            id: 8,
            image: '/assets/step6_2/2/image_1_800_g.png',
            name: 'Бледно розовый сапфир',
            icon: '/assets/step6_2/2/icon_800.png',
          },
          // {
          //   id: 9,
          //   image: '/assets/step6_2/2/image_1_900_g.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/2/icon_900.png',
          // },
          {
            id: 10,
            image: '/assets/step6_2/2/image_1_1000_g.png',
            name: 'Желтый сапфир',
            icon: '/assets/step6_2/2/icon_1000.png',
          },
          {
            id: 11,
            image: '/assets/step6_2/2/image_1_1100_g.png',
            name: 'Зеленый цаворит',
            icon: '/assets/step6_2/2/icon_1100.png',
          },
        ],
        2: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_2_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_2_200_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_2_400_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          {
            id: 7,
            image: '/assets/step6_2/2/image_2_700_g.png',
            name: 'Розовый сапфир',
            icon: '/assets/step6_2/2/icon_700.png',
          },
          {
            id: 8,
            image: '/assets/step6_2/2/image_2_800_g.png',
            name: 'Бледно розовый сапфир',
            icon: '/assets/step6_2/2/icon_800.png',
          },
          // {
          //   id: 6,
          //   image: '/assets/step6_2/2/image_2_600_g.png',
          //   name: 'Фиолетовый аметист',
          //   icon: '/assets/step6_2/2/icon_600.png',
          // },
        ],
        3: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_3_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_3_200_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_3_400_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          {
            id: 5,
            image: '/assets/step6_2/2/image_3_500_g.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/2/icon_500.png',
          },
          {
            id: 550,
            image: '/assets/step6_2/2/image_3_550_g.png',
            name: 'Голубой сапфир',
            icon: '/assets/step6_2/2/icon_550.png',
          },
          // {
          //   id: 9,
          //   image: '/assets/step6_2/2/image_3_900_g.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/2/icon_900.png',
          // },
          {
            id: 10,
            image: '/assets/step6_2/2/image_3_1000_g.png',
            name: 'Желтый сапфир',
            icon: '/assets/step6_2/2/icon_1000.png',
          },
        ],
        4: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_4_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_4_200_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/2/image_4_300_g.png',
            name: 'Черный бриллиант',
            icon: '/assets/step6_2/2/icon_300.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_4_400_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          // {
          //   id: 9,
          //   image: '/assets/step6_2/2/image_4_900_g.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/2/icon_900.png',
          // },
          {
            id: 10,
            image: '/assets/step6_2/2/image_4_1000_g.png',
            name: 'Желтый сапфир',
            icon: '/assets/step6_2/2/icon_1000.png',
          },
        ],
        5: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_5_100_g.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_5_200_g.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/2/image_5_300_g.png',
            name: 'Черный бриллиант',
            icon: '/assets/step6_2/2/icon_300.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_5_400_g.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          {
            id: 11,
            image: '/assets/step6_2/2/image_5_1100_g.png',
            name: 'Зеленый цаворит',
            icon: '/assets/step6_2/2/icon_1100.png',
          },
          {
            id: 10,
            image: '/assets/step6_2/2/image_5_1000_g.png',
            name: 'Желтый сапфир',
            icon: '/assets/step6_2/2/icon_1000.png',
          },
          // {
          //   id: 9,
          //   image: '/assets/step6_2/2/image_5_900_g.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/2/icon_900.png',
          // },
        ],
      },
      s: {
        1: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_1_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_1_200_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/2/image_1_300_s.png',
            name: 'Черный бриллиант',
            icon: '/assets/step6_2/2/icon_300.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_1_400_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          // {
          //   id: 9,
          //   image: '/assets/step6_2/2/image_1_900_s.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/2/icon_900.png',
          // },
          {
            id: 5,
            image: '/assets/step6_2/2/image_1_500_s.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/2/icon_500.png',
          },
          {
            id: 7,
            image: '/assets/step6_2/2/image_1_700_s.png',
            name: 'Розовый сапфир',
            icon: '/assets/step6_2/2/icon_700.png',
          },
          {
            id: 8,
            image: '/assets/step6_2/2/image_1_800_s.png',
            name: 'Бледно розовый сапфир',
            icon: '/assets/step6_2/2/icon_800.png',
          },
          {
            id: 11,
            image: '/assets/step6_2/2/image_1_1100_s.png',
            name: 'Зеленый цаворит',
            icon: '/assets/step6_2/2/icon_1100.png',
          },
          // {
          //   id: 6,
          //   image: '/assets/step6_2/2/image_1_600_s.png',
          //   name: 'Фиолетовый аметист',
          //   icon: '/assets/step6_2/2/icon_600.png',
          // },
        ],
        2: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_2_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_2_200_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 7,
            image: '/assets/step6_2/2/image_2_700_s.png',
            name: 'Розовый сапфир',
            icon: '/assets/step6_2/2/icon_700.png',
          },
          {
            id: 8,
            image: '/assets/step6_2/2/image_2_800_s.png',
            name: 'Бледно розовый сапфир',
            icon: '/assets/step6_2/2/icon_800.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_2_400_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          // {
          //   id: 9,
          //   image: '/assets/step6_2/2/image_2_900_s.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/2/icon_900.png',
          // },
        ],
        3: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_3_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_3_200_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 5,
            image: '/assets/step6_2/2/image_3_500_s.png',
            name: 'Синий сапфир',
            icon: '/assets/step6_2/2/icon_500.png',
          },
          {
            id: 550,
            image: '/assets/step6_2/2/image_3_550_s.png',
            name: 'Голубой сапфир',
            icon: '/assets/step6_2/2/icon_550.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_3_400_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          // {
          //   id: 9,
          //   image: '/assets/step6_2/2/image_3_900_s.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/2/icon_900.png',
          // },
        ],
        4: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_4_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_4_200_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/2/image_4_300_s.png',
            name: 'Черный бриллиант',
            icon: '/assets/step6_2/2/icon_300.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_4_400_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          // {
          //   id: 9,
          //   image: '/assets/step6_2/2/image_4_900_s.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/2/icon_900.png',
          // },
        ],
        5: [
          {
            id: 1,
            image: '/assets/step6_2/2/image_5_100_s.png',
            name: 'Не выделять',
            icon: '/assets/step6_2/2/icon_100.svg',
          },
          {
            id: 2,
            image: '/assets/step6_2/2/image_5_200_s.png',
            name: 'Белый бриллиант',
            icon: '/assets/step6_2/2/icon_200.png',
          },
          {
            id: 3,
            image: '/assets/step6_2/2/image_5_300_s.png',
            name: 'Черный бриллиант',
            icon: '/assets/step6_2/2/icon_300.png',
          },
          {
            id: 11,
            image: '/assets/step6_2/2/image_5_1100_s.png',
            name: 'Зеленый цаворит',
            icon: '/assets/step6_2/2/icon_1100.png',
          },
          {
            id: 4,
            image: '/assets/step6_2/2/image_5_400_s.png',
            name: 'Ярко-розовый рубин',
            icon: '/assets/step6_2/2/icon_400.png',
          },
          // {
          //   id: 9,
          //   image: '/assets/step6_2/2/image_5_900_s.png',
          //   name: 'Красный рубин',
          //   icon: '/assets/step6_2/2/icon_900.png',
          // },
        ],
      },
    },
    step7: {
      prev: 5,
      next: 8,
    },
  },
  {
    id: 3,
    type: 3,
    title: 'Звезда',
    step2: {
      next: 3,
      prev: 1,
      icons: {
        g: '/assets/step2/3/icon_g.png',
        s: '/assets/step2/3/icon_s.svg',
      },
      image: '/assets/step2/3/image.png',
    },
    step3: {
      next: 5,
      prev: 2,
      images: {
        s: '/assets/step3/3/image_s.png',
        g: '/assets/step3/3/image_g.png',
      },
    },
    step5: {
      next: 7,
      prev: 3,
      g: {
        tabs: [
          {
            id: 1,
            title: 'Бриллианты',
            items: [
              {
                id: 100,
                title: 'Белый бриллиант',
                icon: '/assets/step5/3/icon_100.png',
                images:
                {
                  '-1': '/assets/step5/3/image_100_g.png',
                },
              },
              {
                id: 200,
                title: 'Черный бриллиант',
                icon: '/assets/step5/3/icon_200.png',
                images:
                {
                  '-1': '/assets/step5/3/image_200_g.png',
                },
              },
            ],
          },
          {
            id: 2,
            title: 'Сапфиры',
            items: [
              {
                id: 300,
                title: 'Синие сапфиры',
                icon: '/assets/step5/3/icon_300.png',
                images:
                {
                  '-1': '/assets/step5/3/image_300_g.png',
                },
              },
              {
                id: 400,
                title: 'Голубые сапфиры',
                icon: '/assets/step5/3/icon_400.png',
                images:
                {
                  '-1': '/assets/step5/3/image_400_g.png',
                },
              },
              {
                id: 500,
                title: 'Розовые сапфиры',
                icon: '/assets/step5/3/icon_500.png',
                images:
                {
                  '-1': '/assets/step5/3/image_500_g.png',
                },
              },
              {
                id: 600,
                title: 'Бледно розовые сапфиры',
                icon: '/assets/step5/3/icon_600.png',
                images:
                {
                  '-1': '/assets/step5/3/image_600_g.png',
                },
              },
              {
                id: 800,
                title: 'Оранжевые сапфиры',
                icon: '/assets/step5/3/icon_800.png',
                images:
                {
                  '-1': '/assets/step5/3/image_800_g.png',
                },
              },
              {
                id: 900,
                title: 'Желтые сапфиры',
                icon: '/assets/step5/3/icon_900.png',
                images:
                {
                  '-1': '/assets/step5/3/image_900_g.png',
                },
              },
            ],
          },
          {
            id: 3,
            title: 'Другие',
            items: [
              {
                id: 700,
                title: 'Красные рубины',
                icon: '/assets/step5/3/icon_700.png',
                images:
                {
                  '-1': '/assets/step5/3/image_700_g.png',
                },
              },
              {
                id: 1000,
                title: 'Зеленые цавориты',
                icon: '/assets/step5/3/icon_1000.png',
                images:
                {
                  '-1': '/assets/step5/3/image_1000_g.png',
                },
              },
              {
                id: 1100,
                title: 'Ярко-розовые рубины',
                icon: '/assets/step5/3/icon_1100.png',
                images:
                {
                  '-1': '/assets/step5/3/image_1100_g.png',
                },
              },
              // {
              //   id: 1200,
              //   title: 'Фиолетовые аметисты',
              //   icon: '/assets/step5/3/icon_1200.png',
              //   images:
              //   {
              //     '-1': '/assets/step5/3/image_1200_g.png',
              //   },
              // },
              {
                id: 1300,
                title: 'Без камней',
                icon: '/assets/step5/3/icon_1300.svg',
                images:
                {
                  '-1': '/assets/step5/3/image_1300_g.png',
                },
              },
            ],
          },
        ],
      },
      s: {
        tabs: [
          {
            id: 1,
            title: 'Бриллианты',
            items: [
              {
                id: 100,
                title: 'Белый бриллиант',
                icon: '/assets/step5/3/icon_100.png',
                images:
                {
                  '-1': '/assets/step5/3/image_100_s.png',
                },
              },
              {
                id: 200,
                title: 'Черный бриллиант',
                icon: '/assets/step5/3/icon_200.png',
                images:
                {
                  '-1': '/assets/step5/3/image_200_s.png',
                },
              },
            ],
          },
          {
            id: 2,
            title: 'Сапфиры',
            items: [
              {
                id: 300,
                title: 'Синие сапфиры',
                icon: '/assets/step5/3/icon_300.png',
                images:
                {
                  '-1': '/assets/step5/3/image_300_s.png',
                },
              },
              {
                id: 400,
                title: 'Голубые сапфиры',
                icon: '/assets/step5/3/icon_400.png',
                images:
                {
                  '-1': '/assets/step5/3/image_400_s.png',
                },
              },
              {
                id: 500,
                title: 'Розовые сапфиры',
                icon: '/assets/step5/3/icon_500.png',
                images:
                {
                  '-1': '/assets/step5/3/image_500_s.png',
                },
              },
              {
                id: 600,
                title: 'Бледно розовые сапфиры',
                icon: '/assets/step5/3/icon_600.png',
                images:
                {
                  '-1': '/assets/step5/3/image_600_s.png',
                },
              },
              {
                id: 800,
                title: 'Оранжевые сапфиры',
                icon: '/assets/step5/3/icon_800.png',
                images:
                {
                  '-1': '/assets/step5/3/image_800_s.png',
                },
              },
              {
                id: 900,
                title: 'Желтые сапфиры',
                icon: '/assets/step5/3/icon_900.png',
                images:
                {
                  '-1': '/assets/step5/3/image_900_s.png',
                },
              },
            ],
          },
          {
            id: 3,
            title: 'Другие',
            items: [
              {
                id: 700,
                title: 'Красные рубины',
                icon: '/assets/step5/3/icon_700.png',
                images:
                {
                  '-1': '/assets/step5/3/image_700_s.png',
                },
              },
              {
                id: 1000,
                title: 'Зеленые цавориты',
                icon: '/assets/step5/3/icon_1000.png',
                images:
                {
                  '-1': '/assets/step5/3/image_1000_s.png',
                },
              },
              {
                id: 1100,
                title: 'Ярко-розовый рубин',
                icon: '/assets/step5/3/icon_1100.png',
                images:
                {
                  '-1': '/assets/step5/3/image_1100_s.png',
                },
              },
              // {
              //   id: 1200,
              //   title: 'Фиолетовые аметисты',
              //   icon: '/assets/step5/3/icon_1200.png',
              //   images:
              //   {
              //     '-1': '/assets/step5/3/image_1200_s.png',
              //   },
              // },
              {
                id: 1300,
                title: 'Без камней',
                icon: '/assets/step5/3/icon_1300.svg',
                images:
                {
                  '-1': '/assets/step5/3/image_1300_s.png',
                },
              },
            ],
          },
        ],
      },
    },
    step7: {
      prev: 5,
      next: 8,
    },

  },
  {
    id: 4,
    type: 4,
    title: 'Сердце',
    step2: {
      next: 3,
      prev: 1,
      icons: {
        g: '/assets/step2/4/icon_g.png',
        s: '/assets/step2/4/icon_s.svg',
      },
      image: '/assets/step2/4/image.png',
    },
    step3: {
      next: 5,
      prev: 2,
      images: {
        s: '/assets/step3/4/image_s.png',
        g: '/assets/step3/4/image_g.png',
      },
    },
    step5: {
      next: 7,
      prev: 3,
      g: {
        tabs: [
          {
            id: 1,
            title: 'Бриллианты',
            items: [
              {
                id: 100,
                title: 'Белый бриллиант',
                icon: '/assets/step5/4/icon_100.png',
                images:
                {
                  '-1': '/assets/step5/4/image_100_g.png',
                },
              },
              {
                id: 200,
                title: 'Черный бриллиант',
                icon: '/assets/step5/4/icon_200.png',
                images:
                {
                  '-1': '/assets/step5/4/image_200_g.png',
                },
              },
            ],
          },
          {
            id: 2,
            title: 'Сапфиры',
            items: [
              {
                id: 300,
                title: 'Синие сапфиры',
                icon: '/assets/step5/4/icon_300.png',
                images:
                {
                  '-1': '/assets/step5/4/image_300_g.png',
                },
              },
              {
                id: 400,
                title: 'Голубые сапфиры',
                icon: '/assets/step5/4/icon_400.png',
                images:
                {
                  '-1': '/assets/step5/4/image_400_g.png',
                },
              },
              {
                id: 500,
                title: 'Розовые сапфиры',
                icon: '/assets/step5/4/icon_500.png',
                images:
                {
                  '-1': '/assets/step5/4/image_500_g.png',
                },
              },
              {
                id: 600,
                title: 'Бледно розовые сапфиры',
                icon: '/assets/step5/4/icon_600.png',
                images:
                {
                  '-1': '/assets/step5/4/image_600_g.png',
                },
              },
              {
                id: 800,
                title: 'Оранжевые сапфиры',
                icon: '/assets/step5/4/icon_800.png',
                images:
                {
                  '-1': '/assets/step5/4/image_800_g.png',
                },
              },
              {
                id: 900,
                title: 'Желтые сапфиры',
                icon: '/assets/step5/4/icon_900.png',
                images:
                {
                  '-1': '/assets/step5/4/image_900_g.png',
                },
              },
            ],
          },
          {
            id: 3,
            title: 'Другие',
            items: [
              {
                id: 700,
                title: 'Красные рубины',
                icon: '/assets/step5/4/icon_700.png',
                images:
                {
                  '-1': '/assets/step5/4/image_700_g.png',
                },
              },
              {
                id: 1000,
                title: 'Зеленые цавориты',
                icon: '/assets/step5/4/icon_1000.png',
                images:
                {
                  '-1': '/assets/step5/4/image_1000_g.png',
                },
              },
              {
                id: 1100,
                title: 'Ярко-розовый рубин',
                icon: '/assets/step5/4/icon_1100.png',
                images:
                {
                  '-1': '/assets/step5/4/image_1100_g.png',
                },
              },
              // {
              //   id: 1200,
              //   title: 'Фиолетовые аметисты',
              //   icon: '/assets/step5/4/icon_1200.png',
              //   images:
              //   {
              //     '-1': '/assets/step5/4/image_1200_g.png',
              //   },
              // },
              {
                id: 1300,
                title: 'Без камней',
                icon: '/assets/step5/4/icon_1300.svg',
                images:
                {
                  '-1': '/assets/step5/4/image_1300_g.png',
                },
              },
            ],
          },
        ],
      },
      s: {
        tabs: [
          {
            id: 1,
            title: 'Бриллианты',
            items: [
              {
                id: 100,
                title: 'Белый бриллиант',
                icon: '/assets/step5/4/icon_100.png',
                images:
                {
                  '-1': '/assets/step5/4/image_100_s.png',
                },
              },
              {
                id: 200,
                title: 'Черный бриллиант',
                icon: '/assets/step5/4/icon_200.png',
                images:
                {
                  '-1': '/assets/step5/4/image_200_s.png',
                },
              },
            ],
          },
          {
            id: 2,
            title: 'Сапфиры',
            items: [
              {
                id: 300,
                title: 'Синие сапфиры',
                icon: '/assets/step5/4/icon_300.png',
                images:
                {
                  '-1': '/assets/step5/4/image_300_s.png',
                },
              },
              {
                id: 400,
                title: 'Голубые сапфиры',
                icon: '/assets/step5/4/icon_400.png',
                images:
                {
                  '-1': '/assets/step5/4/image_400_s.png',
                },
              },
              {
                id: 500,
                title: 'Розовые сапфиры',
                icon: '/assets/step5/4/icon_500.png',
                images:
                {
                  '-1': '/assets/step5/4/image_500_s.png',
                },
              },
              {
                id: 600,
                title: 'Бледно розовые сапфиры',
                icon: '/assets/step5/4/icon_600.png',
                images:
                {
                  '-1': '/assets/step5/4/image_600_s.png',
                },
              },
              {
                id: 800,
                title: 'Оранжевые сапфиры',
                icon: '/assets/step5/4/icon_800.png',
                images:
                {
                  '-1': '/assets/step5/4/image_800_s.png',
                },
              },
              {
                id: 900,
                title: 'Желтые сапфиры',
                icon: '/assets/step5/4/icon_900.png',
                images:
                {
                  '-1': '/assets/step5/4/image_900_s.png',
                },
              },
            ],
          },
          {
            id: 3,
            title: 'Другие',
            items: [
              {
                id: 700,
                title: 'Красные рубины',
                icon: '/assets/step5/4/icon_700.png',
                images:
                {
                  '-1': '/assets/step5/4/image_700_s.png',
                },
              },
              {
                id: 1000,
                title: 'Зеленые цавориты',
                icon: '/assets/step5/4/icon_1000.png',
                images:
                {
                  '-1': '/assets/step5/4/image_1000_s.png',
                },
              },
              {
                id: 1100,
                title: 'Ярко-розовый рубин',
                icon: '/assets/step5/4/icon_1100.png',
                images:
                {
                  '-1': '/assets/step5/4/image_1100_s.png',
                },
              },
              // {
              //   id: 1200,
              //   title: 'Фиолетовые аметисты',
              //   icon: '/assets/step5/4/icon_1200.png',
              //   images:
              //   {
              //     '-1': '/assets/step5/4/image_1200_s.png',
              //   },
              // },
              {
                id: 1300,
                title: 'Без камней',
                icon: '/assets/step5/4/icon_1300.svg',
                images:
                {
                  '-1': '/assets/step5/4/image_1300_s.png',
                },
              },
            ],
          },
        ],
      },
    },
    step7: {
      prev: 5,
      next: 8,
    },

  },
];

const prices = [
    {
        price: 240,
        image: "/assets/step3/1/image_g.png"
    },
    {
        price: 240,
        image: "/assets/step3/1/image_s.png"
    },
    {
        price: 240,
        image: "/assets/step3/2/image_g.png"
    },
    {
        price: 240,
        image: "/assets/step3/2/image_s.png"
    },
    {
        price: 160,
        image: "/assets/step3/3/image_g.png"
    },
    {
        price: 160,
        image: "/assets/step3/3/image_s.png"
    },
    {
        price: 160,
        image: "/assets/step3/4/image_g.png"
    },
    {
        price: 160,
        image: "/assets/step3/4/image_s.png"
    },
    {
        price: 240,
        image: "/assets/step4/1/image_1_g.png"
    },
    {
        price: 240,
        image: "/assets/step4/1/image_1_s.png"
    },
    {
        price: 240,
        image: "/assets/step4/1/image_2_g.png"
    },
    {
        price: 240,
        image: "/assets/step4/1/image_2_s.png"
    },
    {
        price: 300,
        image: "/assets/step4/1/image_3_g.png"
    },
    {
        price: 300,
        image: "/assets/step4/1/image_3_s.png"
    },
    {
        price: 220,
        image: "/assets/step4/1/image_4_g.png"
    },
    {
        price: 220,
        image: "/assets/step4/1/image_4_s.png"
    },
    {
        price: 240,
        image: "/assets/step4/2/image_1_g.png"
    },
    {
        price: 240,
        image: "/assets/step4/2/image_1_s.png"
    },
    {
        price: 240,
        image: "/assets/step4/2/image_2_g.png"
    },
    {
        price: 240,
        image: "/assets/step4/2/image_2_s.png"
    },
    {
        price: 240,
        image: "/assets/step4/2/image_3_g.png"
    },
    {
        price: 240,
        image: "/assets/step4/2/image_3_s.png"
    },
    {
        price: 300,
        image: "/assets/step4/2/image_4_g.png"
    },
    {
        price: 300,
        image: "/assets/step4/2/image_4_s.png"
    },
    {
        price: 220,
        image: "/assets/step4/2/image_5_g.png"
    },
    {
        price: 220,
        image: "/assets/step4/2/image_5_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_100_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_100_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_200_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_200_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_300_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_300_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_400_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_400_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_500_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_500_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_600_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_600_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_700_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_700_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_800_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_800_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_900_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_900_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_1000_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_1000_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_1100_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_1100_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_1200_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/1/image_2_1200_s.png"
    },
    {
        price: 690,
        image: "/assets/step5/1/image_3_100_g.png"
    },
    {
        price: 690,
        image: "/assets/step5/1/image_3_100_s.png"
    },
    {
        price: 690,
        image: "/assets/step5/1/image_3_200_g.png"
    },
    {
        price: 690,
        image: "/assets/step5/1/image_3_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_300_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_400_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_400_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_500_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_500_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_600_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_600_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_700_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_700_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_800_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_800_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_900_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_900_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_1000_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_1000_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_1100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_1100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_1200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/1/image_3_1200_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_100_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_100_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_200_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_200_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_300_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_300_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_400_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_400_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_500_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_500_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_600_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_600_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_700_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_700_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_800_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_800_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_900_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_900_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_1000_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_1000_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_1100_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_1100_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_1200_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_2_1200_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_100_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_100_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_200_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_200_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_300_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_300_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_400_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_400_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_600_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_600_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_900_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_900_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_1000_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_1000_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_1100_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_1100_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_1200_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/2/image_3_1200_s.png"
    },
    {
        price: 680,
        image: "/assets/step5/2/image_4_100_g.png"
    },
    {
        price: 680,
        image: "/assets/step5/2/image_4_100_s.png"
    },
    {
        price: 680,
        image: "/assets/step5/2/image_4_200_g.png"
    },
    {
        price: 680,
        image: "/assets/step5/2/image_4_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_300_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_400_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_400_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_500_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_500_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_600_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_600_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_700_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_700_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_800_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_800_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_900_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_900_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_1000_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_1000_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_1100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_1100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_1200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/2/image_4_1200_s.png"
    },
    {
        price: 630,
        image: "/assets/step5/3/image_100_g.png"
    },
    {
        price: 630,
        image: "/assets/step5/3/image_100_s.png"
    },
    {
        price: 630,
        image: "/assets/step5/3/image_200_g.png"
    },
    {
        price: 630,
        image: "/assets/step5/3/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_300_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_400_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_400_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_500_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_500_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_600_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_600_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_700_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_700_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_800_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_800_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_900_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_900_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_1000_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_1000_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_1100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_1100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_1200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5/3/image_1200_s.png"
    },
    {
        price: 160,
        image: "/assets/step5/3/image_1300_g.png"
    },
    {
        price: 160,
        image: "/assets/step5/3/image_1300_s.png"
    },
    {
        price: 460,
        image: "/assets/step5/4/image_100_g.png"
    },
    {
        price: 465,
        image: "/assets/step5/4/image_100_s.png"
    },
    {
        price: 465,
        image: "/assets/step5/4/image_200_g.png"
    },
    {
        price: 465,
        image: "/assets/step5/4/image_200_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_300_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_300_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_400_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_400_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_500_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_500_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_600_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_600_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_700_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_700_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_800_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_800_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_900_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_900_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_1000_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_1000_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_1100_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_1100_s.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_1200_g.png"
    },
    {
        price: 240,
        image: "/assets/step5/4/image_1200_s.png"
    },
    {
        price: 160,
        image: "/assets/step5/4/image_1300_g.png"
    },
    {
        price: 160,
        image: "/assets/step5/4/image_1300_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_100_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_100_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_200_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_200_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_300_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_300_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_400_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_400_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_500_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_500_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_600_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_600_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_700_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_700_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_800_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_900_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_1000_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_1100_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/100/image_1200_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/200/image_100_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/200/image_100_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/200/image_200_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/200/image_200_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/200/image_300_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/200/image_300_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/200/image_400_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/1/200/image_400_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/400/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/400/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/400/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/400/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/400/image_300_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/400/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/500/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/500/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/500/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/500/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/500/image_300_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/500/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/600/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/600/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/600/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/600/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/600/image_300_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/600/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/700/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/700/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/700/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/700/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/700/image_300_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/700/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/900/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/900/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/900/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/900/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/900/image_300_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/900/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/1100/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/1100/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/1100/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/1100/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/1100/image_300_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/1/1100/image_300_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_100_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_100_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_200_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_200_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_300_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_300_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_400_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_400_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_500_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_500_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_600_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_700_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/100/image_700_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/200/image_100_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/200/image_100_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/200/image_200_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/200/image_200_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/200/image_300_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/200/image_300_s.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/200/image_400_g.png"
    },
    {
        price: 690,
        image: "/assets/step5_1/2/200/image_400_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/400/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/400/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/500/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/500/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/500/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/500/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/600/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/600/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/600/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/600/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/600/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/600/image_400_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/700/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/700/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/700/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/700/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/700/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/800/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/800/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/900/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/900/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/900/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/900/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/900/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/1100/image_100_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/1100/image_100_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/1100/image_200_g.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/1100/image_200_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/1100/image_300_s.png"
    },
    {
        price: 300,
        image: "/assets/step5_1/2/1100/image_400_s.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/100/image_100.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/100/image_200.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/100/image_300.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/100/image_400.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/200/image_100.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/200/image_200.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/200/image_300.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/300/image_100.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/300/image_200.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/900/image_100.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/900/image_200.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/900/image_300.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/900/image_400.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/900/image_500.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/1100/image_100.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/g/1100/image_200.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/100/image_100.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/100/image_200.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/100/image_300.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/100/image_400.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/100/image_500.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/100/image_600.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/100/image_700.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/200/image_100.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/200/image_200.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/200/image_300.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/300/image_100.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/300/image_200.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/300/image_300.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/600/image_100.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/600/image_200.png"
    },
    {
        price: 240,
        image: "/assets/step5_2/s/600/image_300.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_1_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_1_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_2_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_2_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_3_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_3_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_4_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_4_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_5_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_5_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_6_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_6_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_7_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_8_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/1/image_9_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_1_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_1_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_2_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_2_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_3_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_3_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_4_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_4_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_5_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_1/2/image_5_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_1_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_1_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_1_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_1_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_1_300_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_1_300_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_1_400_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_1_400_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_2_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_2_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_2_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_2_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_2_300_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_2_300_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_2_400_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_2_400_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_3_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_3_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_3_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_3_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_3_300_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_3_300_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_3_400_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_3_400_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_3_450_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_3_450_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_4_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_4_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_4_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_4_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_4_300_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_4_300_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_4_350_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_4_350_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_4_400_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_4_400_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_5_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/1/image_5_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_5_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_5_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_5_300_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_5_300_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_5_350_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_5_350_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_5_370_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/1/image_5_370_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_1_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_1_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_300_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_300_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_400_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_400_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_500_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_500_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_600_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_600_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_700_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_700_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_800_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_800_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_900_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_900_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_1000_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_1100_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_1_1100_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_2_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_2_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_400_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_400_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_600_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_700_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_700_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_800_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_800_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_2_900_s.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_3_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_3_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_400_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_400_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_500_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_500_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_550_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_550_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_900_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_900_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_3_1000_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_4_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_4_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_4_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_4_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_4_300_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_4_300_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_4_400_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_4_400_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_4_900_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_4_900_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_4_1000_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_5_100_g.png"
    },
    {
        price: 220,
        image: "/assets/step6_2/2/image_5_100_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_200_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_200_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_300_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_300_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_400_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_400_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_900_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_900_s.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_1000_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_1100_g.png"
    },
    {
        price: 270,
        image: "/assets/step6_2/2/image_5_1100_s.png"
    }
];

export {
  DATA, prices
};
