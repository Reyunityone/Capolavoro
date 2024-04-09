const svg = document.querySelector("svg.trail");
        const path = svg.querySelector("path");

        let points = [];
        let segments = 50;
        let mouse = {
            x: 0,
            y: 0
        }

        const moveTrail = (ev) => {
            const x = ev.clientX;
            const y = ev.clientY;

            mouse.x = x;
            mouse.y = y;

            if (points.length === 0) {
                for (let i = 0; i < segments; i++) {
                    points.push({
                        x: x,
                        y: y
                    });
                }
            }


        }

        const animate = () => {
            let startX = mouse.x;
            let startY = mouse.y;

            points.forEach((point, index) =>{
                point.x = startX;
                point.y = startY;

                let next = points[index + 1];

                if(next){
                    startX = startX - (point.x - next.x ) * 0.1;
                    startY = startY - (point.y - next.y) * 0.1;
                }
            })

            path.setAttribute("d", `M ${points.map(p => `${p.x} ${p.y}`).join(' L ')}`);

            requestAnimationFrame(animate);
        }

        const resize = () => {
            const windowWidth = window.innerWidth;
            const windowHeight = window.innerHeight;

            svg.style.width = windowWidth + "px";
            svg.style.height = windowHeight + "px";
            svg.setAttribute("viewBox", `0 0 ${windowWidth} ${windowHeight}`);
        }

        document.addEventListener("mousemove", moveTrail);
        window.addEventListener("resize", resize);
        animate();
        resize();