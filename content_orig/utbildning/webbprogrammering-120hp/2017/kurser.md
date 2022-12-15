---
title: Kurser
author: mos
revision:
    "2018-06-08": "(C, mos) Nya versioner på kurser."
    "2018-05-21": "(B, mos) Telecom ej valbar i termin 2 läsperiod 3."
    "2018-02-27": "(A, mos) Första utgåvan i samband vårterminen 2018."

views:
    webbprogrammering11:
        region: columns-above
        template: default/columns
        sort: 10
        data:
            title: Läsår 1 (2017/2018)
            class: col4
            classes: no-bullet
            meta:
                type: columns
                columns:
                    column-1:
                        data:
                            meta:
                                type: content
                                route: kurser/python-v1/block-kurser-kmom
                    column-2:
                        data:
                            meta:
                                type: content
                                route: kurser/javascript1-v1/block-kurser-kmom
                    column-3:
                        data:
                            meta:
                                type: content
                                route: kurser/linux-v2/block-kurser-kmom
                    column-4:
                        data:
                            meta:
                                type: content
                                # ht16 webapp-v2, ht17 webapp-v3
                                route: kurser/webapp-v3/block-kurser-kmom

    webbprogrammering12:
        region: columns-above
        template: default/columns
        sort: 11
        data:
            class: col4
            classes: no-bullet
            meta:
                type: columns
                columns:
                    column-1:
                        data:
                            meta:
                                type: content
                                route: kurser/htmlphp-v2/block-kurser-kmom
                    column-2:
                        data:
                            meta:
                                type: content
                                route: kurser/design-v1/block-kurser-kmom
                    column-3:
                        data:
                            meta:
                                type: content
                                # ht16 = oopython-v1, ht17 = oopython-v2
                                route: kurser/oopython-v2/block-kurser-kmom
                    column-4:
                        data:
                            meta:
                                type: content
                                # ht16 oophp-v3, ht17 databas-v1, ht18 oophp-v4
                                route: kurser/databas-v1/block-kurser-kmom

    webbprogrammering21:
        region: columns-above
        template: default/columns
        sort: 20
        data:
            title: Läsår 2 (2018/2019)
            class: col4
            classes: no-bullet
            meta:
                type: columns
                columns:
                    column-1:
                        data:
                            meta:
                                type: content
                                route: kurser/oophp-v4/block-kurser-kmom
                    column-2:
                        data:
                            meta:
                                type: content
                                route: kurser/ramverk1-v2/block-kurser-kmom
                    column-3:
                        data:
                            meta:
                                type: content
                                route: kurser/ramverk2-v2/block-kurser-kmom
                    column-4:
                        data:
                            meta:
                                type: content
                                #route: kurser/valbar/block-telecom-eller-sysver
                                route: kurser/sysver/block-kurser-kmom

    webbprogrammering22:
        region: columns-above
        template: default/columns
        sort: 21
        data:
            class: col4
            classes: no-bullet
            meta:
                type: columns
                columns:
                    column-1:
                        data:
                            meta:
                                type: content
                                route: kurser/indproj/block-kurser-kmom
                    column-2:
                        data:
                            meta:
                                type: content
                                route: kurser/matmod/block-kurser-kmom
                    column-3:
                        data:
                            meta:
                                type: content
                                route: kurser/exjobb/block-kurser-kmom
                    column-4:
                        data:
                            meta:
                                type: content
                                route: kurser/exjobb/block-kurser-kmom
...
